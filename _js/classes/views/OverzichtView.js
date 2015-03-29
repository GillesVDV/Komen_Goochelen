var GoochelaarCollection = require('../collections/GoochelaarCollection.js');
var GoochelaarView = require('./GoochelaarView.js');

var Baseview = require('./Baseview.js');
var template = require('../../../_hbs/overview.hbs');
var showbtn;


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
		    self.currentdag = data[0].currentdag;
		    showbtn = data[0].eindeweek;

		    if(showbtn == 1){
	    		console.log('de week is beindigd');

		    }else{
		    	console.log('week is bezig');
		    	document.querySelector('.winnaarbtn').style.display= 'none';

		    }

		});	
		
	},

	renderGoochelaars: function(){
		var self = this;
		this.$goochelaars.empty();
		$.get('index.php?page=cmssettings', function ( data ) {
		    self.currentdag = data[0].currentdag;
		    self.eindeweek = data[0].eindeweek;
			
			self.collection.forEach(self.renderGoochelaar, self);

		});	
	},

	renderGoochelaar: function(model){
	    if (model.get('dag') == this.currentdag) {
	    	model.set({showButton : true});
	    }

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