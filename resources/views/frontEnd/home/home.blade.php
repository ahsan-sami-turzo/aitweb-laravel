<style>

.services-grid-left p {
    
    font-size: 14px !important;
	font-family: 'Roboto', sans-serif !important;
	
}

.services-grid-left p {
    color: black !important;
}
</style>
<section class="section page-section" id="home">
    <div class="banner-bottom">
		<div class="container">
			<div class="w3-banner-bottom-heading">
				<h3>Why  <span>Choose Us ?</span></h3><br>
			</div>
			<div class="row">
				@foreach($whyChooseUsInfos as $whyChooseUsInfo)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="services-grid1">
						<div class="services-grid-right agile-services-grid-right">
							<div class="services-grid-right-grid hvr-radial-out {{$whyChooseUsInfo->choose_color}}">
								<span class="glyphicon glyphicon-grain" aria-hidden="true"></span>
							</div>
						</div>
						<div class="services-grid-left agile-services-grid-left choose_us">
                            <h4>{{$whyChooseUsInfo->choose_title}}</h4>
                            <p>{{$whyChooseUsInfo->choose_details}}</p>
						</div>
					</div>
                </div>
				@endforeach
            </div>
		</div>
	</div>
</section>
@include('frontEnd.aboutUs.about')
@include('frontEnd.services.servicePage')
@include('frontEnd.gallery.index')
@include('frontEnd.latestSoftware.latestSoftware')
@include('frontEnd.product.product')

@include('frontEnd.clientSlider.clientSlider')
{{-- @include('frontEnd.contact.contact') --}}
