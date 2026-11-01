<div class="banner-form wow fadeInUp" data-wow-delay="300ms">
    <div class="container">
        <form class="banner-form__wrapper" action="{{ route('tours.index') }}" method="GET">
            <div class="row">
                <div class="col-lg-4">
                    <div class="banner-form__control">
                        <label for="location">Destination</label>
                        <select name="location" class="selectpicker" id="location">
                            <option value="">Where to Next?</option>
                            @foreach($destinations as $destination)
                            <option value="{{ $destination->id }}"
                                {{ request('location') == $destination->id ? 'selected' : '' }}>
                                {{ $destination->name }}
                            </option>
                            @endforeach
                        </select>
                        <i class="icon-location-2"></i>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="banner-form__control">
                        <label for="type">Type</label>
                        <select name="type" class="selectpicker" id="type">
                            <option value="">Booking Type</option>
                            @foreach($types as $type)
                            <option value="{{ $type->id }}"
                                {{ request('type') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                            @endforeach
                        </select>
                        <i class="icon-hiking"></i>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="banner-form__control">
                        <label for="price_range">Price Range</label>
                        <select name="price_range" class="selectpicker" id="price_range">
                            <option value="">Select Price Range</option>
                            <option value="0-50" {{ request('price_range') == '0-50' ? 'selected' : '' }}>0 - 50
                            </option>
                            <option value="50-100" {{ request('price_range') == '50-100' ? 'selected' : '' }}>50
                                - 100</option>
                            <option value="100-200" {{ request('price_range') == '100-200' ? 'selected' : '' }}>
                                100 - 200</option>
                            <option value="200-500" {{ request('price_range') == '200-500' ? 'selected' : '' }}>
                                200 - 500</option>
                            <option value="500+" {{ request('price_range') == '500+' ? 'selected' : '' }}>500+
                            </option>
                        </select>
                        <i class="icon-low-price"></i>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="banner-form__control">
                        <label for="amenities">Amenities</label>
                        <select name="amenities[]" class="selectpicker" id="amenities" multiple>
                            @foreach($amenities as $amenity)
                            <option value="{{ $amenity->id }}"
                                {{ in_array($amenity->id, request('amenities', [])) ? 'selected' : '' }}>
                                {{ $amenity->name }}
                            </option>
                            @endforeach
                        </select>
                        <i class="icon-amenity"></i>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="banner-form__btn">
                         <button type="submit" aria-label="search submit" class="trevlo-btn trevlo-btn--base">
                            <span><i class="icon-search"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

