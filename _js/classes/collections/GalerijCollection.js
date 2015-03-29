var Galerij = require('../models/Galerij.js');

var GalerijCollection = Backbone.Collection.extend({

	model: Galerij,
	url: 'api/galerij',

	sync: function(method, model, options) {
		if(model.methodUrl && model.methodUrl(method.toLowerCase())) {
			options = options || {};
			options.url = model.methodUrl(method.toLowerCase());
		}
    Backbone.Collection.prototype.sync.apply(this, arguments);
	}

});

module.exports = GalerijCollection;