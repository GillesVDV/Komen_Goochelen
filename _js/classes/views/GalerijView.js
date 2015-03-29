var GalerijCollection = require('../collections/GalerijCollection.js');
var FotoView = require('./FotoView.js');
var Baseview = require('./Baseview.js');
var template = require('../../../_hbs/galerij.hbs');

var galerijView = Baseview.extend({

	template: template,
	tagName: 'div',
	className: 'galerij',

	events: {
		'click .imgbtn': 'uploadImage',
	},

	initialize: function(){
		_.extend(this.events, Baseview.prototype.events);

		this.collection = new GalerijCollection();
		this.listenTo(this.collection, 'sync', this.renderGalerij);
		this.collection.fetch();
	},

	renderGalerij: function(){
		this.$galerij.empty();
		this.collection.forEach(this.renderFoto, this);
	},

	renderFoto: function(model){

		var view = new FotoView({
			model: model
		});
		this.$galerij.append(view.render().el);
	},


	render: function(){

		this.$el.html(this.template());
		this.$galerij = this.$el.find('.fotos');
		return this;

	},

	uploadImage: function(e){
		e.preventDefault();

		console.log('[galerijview] klik upload');
		
		
	},

	


});

module.exports = galerijView;