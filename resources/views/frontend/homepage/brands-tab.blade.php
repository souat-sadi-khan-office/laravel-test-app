<div class="client-logo brand-slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}, "1199":{"items": "6"}}'>
    @foreach ($brands as $brand)
        <div class="item">
            <div class="cl_logo">
                <a href="{{ $brand['slug'] }}">
                    <img class="brand-image" src="{{ asset($brand['logo']) }}" alt="{{ $brand['name'] }}"/>
                </a>
            </div>
        </div>
    @endforeach
</div>