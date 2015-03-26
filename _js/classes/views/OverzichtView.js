var GoochelaarCollection = require('../collections/GoochelaarCollection.js');
var GoochelaarView = require('./GoochelaarView.js');

var template = require('../../../_hbs/overview.hbs');

var Overzichtiew = Backbone.View.extend({

	template: template,
	tagName: 'div',
	className: 'overview',

	events: {
		
	},

	initialize: function(){

		this.collection = new GoochelaarCollection();
		this.listenTo(this.collection, 'sync', this.renderGoochelaars);
		this.collection.fetch();

		console.log(this.collection);

	},

	renderGoochelaars: function(){
		this.$goochelaars.empty();
		this.collection.forEach(this.renderGoochelaar, this);
	},

	renderGoochelaar: function(model){

		var view = new GoochelaarView({
			model: model
		});

		this.$goochelaars.append(view.render().el);
		
	},


	render: function(){

		this.$el.html(this.template());
		this.$goochelaars = this.$el.find('.goochelaars');

		return this;

	}

});

module.exports = Overzichtiew;