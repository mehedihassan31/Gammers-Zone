
<div class="owl-carousel owl-theme owl-loaded">
    @foreach ($slider as $slider)
    <div class="item">
        <img height="500px" width="100%" src="{{$slider->photo}}" alt="slider">
    </div>
    @endforeach
</div>

