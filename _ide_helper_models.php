<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string $type
 * @property string|null $img
 * @property \Illuminate\Support\Carbon|null $last_login
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $avatar
 * @property-read mixed $last_login_human
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User type(string $type = 'user')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace Modules\Base\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $iso_code_2
 * @property string $iso_code_3
 * @property string|null $phone_code
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read mixed $flag
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereIsoCode2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereIsoCode3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country wherePhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace Modules\Base\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $message
 * @property string|null $channel
 * @property int $level
 * @property string $level_name
 * @property int $unix_time
 * @property string|null $datetime
 * @property null|array $context
 * @property null|array $extra
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $color
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb whereExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb whereLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb whereUnixTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogDb whereUpdatedAt($value)
 */
	class LogDb extends \Eloquent {}
}

namespace Modules\Base\Models{
/**
 * 
 *
 * @property int $id
 * @property string $key
 * @property array<array-key, mixed> $value
 * @property-read mixed $translations
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seo whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seo whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seo whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seo whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seo whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seo whereValue($value)
 */
	class Seo extends \Eloquent {}
}

namespace Modules\Base\Models{
/**
 * 
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Settings whereValue($value)
 */
	class Settings extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * 
 *
 * @property int $id
 * @property int $category_id
 * @property array<array-key, mixed> $title
 * @property string $slug
 * @property array<array-key, mixed> $description
 * @property array<array-key, mixed> $keywords
 * @property array<array-key, mixed> $content
 * @property string $image
 * @property string $status
 * @property int $featured
 * @property int $visits
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Cms\Models\BlogCategory $category
 * @property-read mixed $image_link
 * @property-read mixed $translations
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog featured()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blog whereVisits($value)
 */
	class Blog extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * 
 *
 * @property int $id
 * @property array<array-key, mixed> $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $translations
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereUpdatedAt($value)
 */
	class BlogCategory extends \Eloquent {}
}

namespace Modules\Cms\Models{
/**
 * 
 *
 * @property int $id
 * @property array<array-key, mixed> $title
 * @property string $slug
 * @property array<array-key, mixed> $description
 * @property array<array-key, mixed> $keywords
 * @property array<array-key, mixed> $content
 * @property string $image
 * @property string $status
 * @property int $featured
 * @property int $visits
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $image_link
 * @property-read mixed $translations
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page featured()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereVisits($value)
 */
	class Page extends \Eloquent {}
}

namespace Modules\Support\Models{
/**
 * 
 *
 * @property int $id
 * @property string $ip_address
 * @property string $name
 * @property string $email
 * @property string|null $mobile
 * @property string|null $subject
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ContactForm whereUpdatedAt($value)
 */
	class ContactForm extends \Eloquent {}
}

namespace Modules\Support\Models{
/**
 * 
 *
 * @property int $id
 * @property string $ip_address
 * @property string $email
 * @property string $lang
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscriber whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscriber whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscriber whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscriber whereUpdatedAt($value)
 */
	class Subscriber extends \Eloquent {}
}

