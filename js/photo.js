function Juge(theForm)
		{   
			//访客验证（prompt验证码）
            var score;
			
			score = prompt("请输入验证码");
			
			if(score > 90180000){
				alert("准备上传");
			}else{
			    // window.location.reload();
			history.go(-1);
				// window.close(); 
			
			}
              

			if (theForm.upfile.value == "")
			{
				alert("请先选择文件！");
				theForm.upfile.focus();
				return (false);
			}
			if (theForm.content.value == "")
			{
				alert("请输入图片说明！");
				theForm.content.focus();
				return (false);
			}
			if (theForm.content.value.length>60)
			{
				alert("图片说明内容太多了，请删除一点再发！");
				theForm.content.focus();
				return (false);
			}
		}