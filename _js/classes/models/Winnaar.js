var Winnaar = Backbone.Model.extend({

	defaults: {
		"artiestennaam": "",
		"email": "",
		"dag": "",
		"currentdag": "",
		"totaalscore": "",

	},

	urlRoot: 'api/winnaars',
	
	sync: function(method, model, options) {
		if(model.methodUrl && model.methodUrl(method.toLowerCase())) {
			options = options || {};
			options.url = model.methodUrl(method.toLowerCase());
		}
    Backbone.Collection.prototype.sync.apply(this, arguments);
	}

});

module.exports = Winnaar;