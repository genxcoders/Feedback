<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="CRUD" clonable="1" routable='1' parent='' order='1' >
	<!-- Custom Routes -->
	<cms:route name='list_crud' path='' />
	<cms:route name='create_crud' path='create' />
    <cms:route name='edit_crud' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_crud' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
<!-- Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<div class="gxcpl-ptop-30"></div>

			<!-- Section Divider -->
			<div class="gxcpl-ptop-10"></div>
			<!-- <div class="gxcpl-divider-dark"></div> -->
			<div class="gxcpl-ptop-10"></div>
			<!-- Section Divider -->

			<!-- crud -->
			<cms:match_route debug='0' />
			<cms:embed "crud/<cms:show k_matched_route />.html" />
			<!-- crud -->
		</div>
	</div>
	<!-- Content Here -->
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>