var answer = new Vue({
	el:"#answer",
	data:{

	},
	methods:{
		submit:function(username,exam_code,question_number,answer){
			axios({
				method:'post',
				url:'/Exam_Taker/Submit_Answer',
				data:{
					username:username,
					exam_code:exam_code,
					question_number:question_number,
					answer:answer
				}
			})

		}
	}

})
