var Goochelaar = require('../models/Goochelaar.js');

var GoochelaarCollection = Backbone.Collection.extend({

	model: Goochelaar,
	url: 'api/overzicht',

	//sorteren van tweets, .sort oproepen voor je je tweets rendert
	comparator: function(goochelaar) {
		return - goochelaar.get("artist");
	},

	sync: function(method, model, options) {
		if(model.methodUrl && model.methodUrl(method.toLowerCase())) {
			options = options || {};
			options.url = model.methodUrl(method.toLowerCase());
		}
    Backbone.Collection.prototype.sync.apply(this, arguments);
	}

});

module.exports = GoochelaarCollection;