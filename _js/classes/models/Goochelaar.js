var Goochelaar = Backbone.Model.extend({

	defaults: {
		"artiestennaam": "",
		"email": ""
	},

	urlRoot: 'api/overzicht',
	
	sync: function(method, model, options) {
		if(model.methodUrl && model.methodUrl(method.toLowerCase())) {
			options = options || {};
			options.url = model.methodUrl(method.toLowerCase());
		}
    Backbone.Collection.prototype.sync.apply(this, arguments);
	}

});

module.exports = Goochelaar;