var GoochelaarCollection = require('../collections/GoochelaarCollection.js');
var GoochelaarView = require('./GoochelaarView.js');

var Baseview = require('./Baseview.js');
var template = require('../../../_hbs/overview.hbs');
var currentdag;
var eindeweek;

var Overzichtiew = Baseview.extend({

	template: template,
	tagName: 'div',
	className: 'overview',

	initialize: function(){

		this.collection = new GoochelaarCollection();
		this.listenTo(this.collection, 'sync', this.renderGoochelaars);
		this.collection.fetch();

		$.get('index.php?page=session', function ( data ) {

		});

		$.get('index.php?page=cmssettings', function ( data ) {
		    currentdag = data[0].currentdag;
		    eindeweek = data[0].eindeweek;
		    console.log(currentdag + "" + eindeweek);
		});

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

	},

	


});

module.exports = Overzichtiew;