var Winnaar = require('../models/Winnaar.js');

var WinnaarsCollection = Backbone.Collection.extend({

	model: Winnaar,
	url: 'api/winnaars',

	//sorteren van tweets, .sort oproepen voor je je tweets rendert


	sync: function(method, model, options) {
		if(model.methodUrl && model.methodUrl(method.toLowerCase())) {
			options = options || {};
			options.url = model.methodUrl(method.toLowerCase());
		}
    Backbone.Collection.prototype.sync.apply(this, arguments);
	}

});

module.exports = WinnaarsCollection;