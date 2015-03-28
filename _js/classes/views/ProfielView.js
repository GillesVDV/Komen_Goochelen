var template = require('../../../_hbs/profiel.hbs');
var Goochelaar = require('../models/Goochelaar.js');
var GoochelaarCollection = require('../collections/GoochelaarCollection.js');
var Baseview = require('./Baseview.js');
//var FeedbackItemView = require('./FeedbackItemView.js');

var ProfielView = Baseview.extend({

	template: template,
	tagName: 'section',
	className: 'detail',

	events: {
		
	},

	initialize: function(options){

		_.extend(this.events, Baseview.prototype.events);

		if(options && options.id){

			this.model = new Goochelaar();

			this.model.set('id', options.id);
			this.model.fetch({
				success: function(model, response){
					if(response.length === 0){
						Window.Application.navigate('overzicht', {trigger:true});
					}
				}
			});
			this.listenTo(this.model, "sync", this.render);

			// this.feedback = new FeedbackCollection({
			// 	student_id: options.id
			// });
			//this.feedback.on('sync', this.renderAllFeedback, this);
		}

	},

	// renderAllFeedback: function(){
	// 	this.$feedback.empty();
	// 	this.feedback.forEach(this.renderFeedback, this);
	// },

	// renderFeedback: function(feedback){
	// 	console.log(feedback);
	// 	this.$feedback.append(
	// 		new FeedbackItemView({model: feedback}).render().el);
	// },

	render: function(){
		this.$el.html(this.template(this.model.attributes));
		//this.$feedback = this.$el.find('ul');

		//this.feedback.fetch();

		return this;
	}
	
});

module.exports = ProfielView;