var Galerij = Backbone.Model.extend({

	defaults: {
		"user_id": "",
		"picture": "",
		"extension": "",
		"description": "",
	},

	urlRoot: 'api/galerij',
	
	sync: function(method, model, options) {
		if(model.methodUrl && model.methodUrl(method.toLowerCase())) {
			options = options || {};
			options.url = model.methodUrl(method.toLowerCase());
		}
    Backbone.Collection.prototype.sync.apply(this, arguments);
	}

});

module.exports = Galerij;