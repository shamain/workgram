/* 
Created by: Kenrick Beckett

Name: Chat Engine
*/

var instanse = false;
var state;
var mes;
var file;
var uname;

function setUname(c){
    
   uname=c; 
    
}
function Chat () {
    this.update = updateChat;
    this.send = sendChat;
	this.getState = getStateOfChat;
}

//gets the state of the chat
function getStateOfChat(){
	if(!instanse){
		 instanse = true;
		 $.ajax({
			   type: "POST",
			   url: site_url+"/chat/process",
			   data: {  
			   			'function': 'getState',
						'file': file
						},
			   dataType: "json",
			
			   success: function(data){
				   state = data.state;
				   instanse = false;
			   },
			});
	}	 
}

//Updates the chat
function updateChat(){
	 if(!instanse){
		 instanse = true;
	     $.ajax({
			   type: "POST",
			   url: site_url+"/chat/process",
			   data: {  
			   			'function': 'update',
						'state': state,
						'file': file
						},
			   dataType: "json",
			   success: function(data){
                              
				   if(data.text){
						for (var i = 0; i < data.text.length; i++) {
                                                  console.log('data '+ data.text[i].toString().replace('<span>','').replace('</span>','+').split('+')[0] +" "+data.text[i].toString().replace('<span>','').replace('</span>','+').split('+')[1]);  
                                                  if(uname==data.text[i].toString().replace('<span>','').replace('</span>','+').split('+')[0]){
                                                       console.log('user name '+data.text[i].toString().replace('<span>','').replace('</span>','+').split('+')[0]);
 $('.chat-messages').append("<div class=\"user-details-wrapper\" ><div class=\"user-profile\"> <img src=\"<?php echo base_url(); ?>application_resources/img/profiles/d.jpg\"  alt=\"\" data-src=\"<?php echo base_url(); ?>application_resources/img/profiles/d.jpg\" data-src-retina=\"<?php echo base_url(); ?>application_resources/img/profiles/d2x.jpg\" width=\"35\" height=\"35\"> </div><div class=\"user-details\"><div class=\"bubble\"> "+ data.text[i].toString().replace('<span>','').replace('</span>','+').split('+')[1] +" </div></div><div class=\"clearfix\"></div><div class=\"sent_time off\">Yesterday 11:25pm</div></div>");
                                                  }else{
                                                       console.log('user name '+data.text[i].toString().replace('<span>','').replace('</span>','+').split('+')[0]);
     $('.chat-messages').append("<div class=\"user-details-wrapper pull-right\" ><div class=\"user-profile\"> <img src=\"<?php echo base_url(); ?>application_resources/img/profiles/d.jpg\"  alt=\"\" data-src=\"<?php echo base_url(); ?>application_resources/img/profiles/d.jpg\" data-src-retina=\"<?php echo base_url(); ?>application_resources/img/profiles/d2x.jpg\" width=\"35\" height=\"35\"> </div><div class=\"user-details\"><div class=\"bubble sender\"> "+ data.text[i].toString().replace('<span>','').replace('</span>','+').split('+')[1] +" </div></div><div class=\"clearfix\"></div><div class=\"sent_time off\">Yesterday 11:25pm</div></div>"); 
                                                  } }								  
				   }
				   document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
				   instanse = false;
				   state = data.state;
			   },
			});
	 }
	 else {
		 setTimeout(updateChat, 1500);
	 }
}

//send the message
function sendChat(message, nickname)
{       
    updateChat();
     $.ajax({
		   type: "POST",
		   url: site_url+"/chat/process",
		   data: {  
		   			'function': 'send',
					'message': message,
					'nickname': nickname,
					'file': file
				 },
		   dataType: "json",
		   success: function(data){
			   updateChat();
		   },
		});
}
