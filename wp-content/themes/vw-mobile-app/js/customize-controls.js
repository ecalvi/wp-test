( function( api ) {

	// Extends our custom "vw-mobile-app" section.
	api.sectionConstructor['vw-mobile-app'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );