<?php

namespace Modules\Core\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

trait FileTrait {
    /**
     * Uploads a file or image to the specified directory.
     */
    public function upload(
        UploadedFile $file,
        string       $dir,
        ?string      $name = null,
        ?string      $old = null,
        ?int         $width = null,
        string       $disk = 'public'
    ): ?string {
        // Validate the file
        if (!$this->isValidFile($file)) {
            return null;
        }

        // Remove old file if specified
        if ($old) {
            $this->deleteFile($old, $disk);
        }

        // Generate a secure filename
        $filename = $this->generateFilename($file, $name);

        // Handle PDF files
        if ($file->getMimeType() === 'application/pdf') {
            return Storage::disk($disk)->putFileAs($dir, $file, $filename);
        }

        // Process and upload image
        $image = Image::read($file);
        if ($width) {
            $image->resize($width);
        }
        Storage::disk($disk)->put($dir.'/'.$filename, (string) $image->encode());

        return $dir.'/'.$filename;
    }

    /**
     * Validates if a file is acceptable for upload.
     */
    private function isValidFile(UploadedFile $file): bool {
        if (!$file->isValid()) {
            session()->flushMessage(false, __('The selected file is not valid.'));
            return false;
        }

        $allowedMimeTypes = config('core.allowed_mime_types');
        if (!in_array($file->getMimeType(), $allowedMimeTypes, true)) {
            session()->flushMessage(false, __('File type is not allowed.'));
            return false;
        }

        return true;
    }

    /**
     * Deletes a file from the specified disk.
     */
    public function deleteFile(string $filename, string $disk = 'public'): void {
        try {
            Storage::disk($disk)->delete($filename);
        } catch (FileException $exception) {
            session()->flushMessage(false, __('An Error Occurred!'), $exception);
        }
    }

    /**
     * Generates a sanitized, secure filename.
     */
    private function generateFilename(UploadedFile $file, ?string $name = null): string {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $sanitizedOriginalName = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $originalName);
        $hash = md5($sanitizedOriginalName.time());

        return ($name ?? $hash).'.'.$file->getClientOriginalExtension();
    }

    /**
     * Deletes an entire directory from the specified disk.
     */
    public function deleteDir(string $dir, string $disk = 'public'): void {
        try {
            Storage::disk($disk)->deleteDirectory($dir);
        } catch (FileException $exception) {
            session()->flushMessage(false, __('An Error Occurred!'), $exception);
        }
    }
}
