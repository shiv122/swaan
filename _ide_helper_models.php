<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CategoryRegion> $regions
 * @property-read int|null $regions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubCategory> $subcategories
 * @property-read int|null $subcategories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category active()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CategoryRegion
 *
 * @property int $id
 * @property int $category_id
 * @property int $region_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRegion whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRegion whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryRegion whereUpdatedAt($value)
 */
	class CategoryRegion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Provider
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string|null $address
 * @property string|null $image
 * @property string|null $password
 * @property string|null $device_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProviderSlot> $slots
 * @property-read int|null $slots_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Provider active()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereUpdatedAt($value)
 */
	class Provider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProviderData
 *
 * @property int $id
 * @property int $provider_id
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string|null $latitude
 * @property string|null $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderData whereUpdatedAt($value)
 */
	class ProviderData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProviderSlot
 *
 * @property int $id
 * @property int $provider_id
 * @property string $start_time
 * @property string $end_time
 * @property string $day
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderSlot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderSlot query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderSlot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderSlot whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderSlot whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderSlot whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderSlot whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderSlot whereUpdatedAt($value)
 */
	class ProviderSlot extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Region
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $country_code
 * @property string|null $short_code
 * @method static \Illuminate\Database\Eloquent\Builder|Region active()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereShortCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 */
	class Region extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property int $provider_id
 * @property string $name
 * @property int $category_id
 * @property int|null $sub_category_id
 * @property string|null $description
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string $type
 * @property float $price
 * @property float $discount
 * @property int|null $hours
 * @property int|null $minutes
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ServiceImage> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\Provider $provider
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ServiceSlot> $slots
 * @property-read int|null $slots_count
 * @property-read \App\Models\SubCategory|null $sub_category
 * @method static \Illuminate\Database\Eloquent\Builder|Service active()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ServiceImage
 *
 * @property int $id
 * @property int $service_id
 * @property string $image
 * @property int $is_main
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceImage whereIsMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceImage whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceImage whereUpdatedAt($value)
 */
	class ServiceImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ServiceSlot
 *
 * @property int $id
 * @property int $service_id
 * @property int $slot_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Service $service
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSlot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSlot query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSlot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSlot whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSlot whereSlotId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceSlot whereUpdatedAt($value)
 */
	class ServiceSlot extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubCategory
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string|null $image
 * @property string|null $description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereUpdatedAt($value)
 */
	class SubCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $phone
 * @property string $password
 * @property string|null $device_id
 * @property int $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

