var lastHightlighedRegion = '';
function highlightRegion(region) {
	clearMap();
	jQuery('#mapOverlay').addClass(region);
	lastHightlighedRegion = region;
}

function clearMap() {
	if (lastHightlighedRegion != '') {
		jQuery('#mapOverlay').removeClass(lastHightlighedRegion);
		lastHightlighedRegion = '';
	}
}