<?php echo $header_script;?>
<?php echo $header;?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	 h1 {
    font-family:'Gabriola', serif;
    text-align: center;
}
ul {
    list-style: none;
}
li {
    font-family:'Cambria', serif;
    font-size: 1.5em;
}
input[type=radio] {
    border: 0px;
    width: 20px;
    height: 2em;
}
p {
    font-family:'Gabriola', serif;
}
/* Quiz Classes */
 .quizContainer {
    background-color: white;
    border-radius: 6px;
    width: 75%;
    margin: auto;
    padding-top: 5px;
    /*-moz-box-shadow: 10px 10px 5px #888;
    -webkit-box-shadow: 10px 10px 5px #888;
    box-shadow: 10px 10px 5px #888;*/
    position: relative;
}
.quizcontainer #quiz1
{
text-shadow:1px 1px 2px orange;
font-family:"Georgia", Arial, sans-serif;
}
.nextButton {
    box-shadow: 3px 3px 5px #888;
    border-radius: 6px;
   /* width: 150px;*/
    height: 40px;
    text-align: center;
    background-color: lightgrey;
    /*clear: both;*/
    color: red;
    font-family:'Gabriola', serif;
    position: relative;
    margin: auto;
	font-size:25px;
	font-weight:bold;
    padding-top: 5px;
	float:right;
	right:30%;
}

.preButton {
    box-shadow: 3px 3px 5px #888;
    border-radius: 6px;
    /*width: 150px;*/
    height: 40px;
    text-align: center;
    background-color: lightgrey;
    /*clear: both;*/
    color: red;
    font-family:'Gabriola', serif;
    position: relative;
    margin: auto;
	font-size:25px;
	font-weight:bold;
    padding-top: 5px;
	float:left;
	left:30%;
}

.question {
    font-family:'Century', serif;
    font-size: 1.5em;
	font-weight:bold;
    width: 100%;
    height: auto;
    margin: auto;
    border-radius: 6px;
    background-color: #f3dc45;
    text-align: center;
}
.quizMessage {
    background-color: peachpuff;
    border-radius: 6px;
    width: 20%;
    margin: auto;
    text-align: center;
    padding: 5px;
	font-size:20px;
	font-weight:bold;
    font-family:'Gabriola', serif;
    color: red;
	position:absolute;
	top:70%;
	left:40%;
}
.choiceList {
    font-family: 'Arial', serif;
    color: #ed12cd;
	font-size:15px;
	font-weight:bold;
}
.result {
    width: 40%;
    height: auto;
    border-radius: 6px;
    background-color: linen;
    margin: auto;
	color:green;
    text-align: center;
	font-size:25px;
    font-family:'Verdana', serif;
	font-weight:bold;
	position:absolute;
	top:67%;
	left:30%;
}
/* End of Quiz Classes */
</style>
    <div class="quizContainer container-fluid well well-lg">
        <div id="quiz1" class="text-center">
			<!-- <center><img class="img-responsive" height="180" width="180" src="http://res.cloudinary.com/dwjej2tbp/image/upload/v1523002021/KGCAS_SK_eyehy9.jpg"></center> -->
			<h4 style="color:#FF0000;position:absolute;left:70%;top:30%;" align="center" ><span id="iTimeShow">Time Remaining: </span><br/><span id='timer' style="font-size:25px;"></span></h4>
			<?php $course= getCourseNameById($course_id);?>
			<h2><?php echo $course['name']?></h2>
		</div>
		
        <div class="question"></div>
        <ul class="choiceList"></ul>
        <div class="quizMessage"></div>
        <div class="result"></div>
		<button onclick="submitAnswer()" class="btn btn-success btn-sm pull-right" id="submitbtn" style="display: none;">Submit</button>
		<button class="preButton">Previous Question</button>
        <button class="nextButton">Next Question</button>
        

    </div>


<script type="text/javascript">
<?php $questions= getAllQuestinsByID($course_id);?>;
	var questions = <?php echo json_encode($questions);?>;

// var abc="";
var currentQuestion = 0;
var viewingAns = 0;
var correctAnswers = 0;
var quizOver = false;
var iSelectedAnswer = [];
var answer = [];
	var c=180;
	var t;
$(document).ready(function () 
{
    // Display the first question
    displayCurrentQuestion();
    $(this).find(".quizMessage").hide();
    $(this).find(".preButton").attr('disabled', 'disabled');
	
	timedCount();
	
	$(this).find(".preButton").on("click", function () 
	{		
		
        if (!quizOver) 
		{

			if(currentQuestion == 0) { return false; }
			if(currentQuestion == 1) {
			  $(".preButton").attr('disabled', 'disabled');
			}
				correctAnswers--
				currentQuestion--; // Since we have already displayed the first question on DOM ready
				answer.pop();
				if (currentQuestion < questions.length) 
				{
					console.log("correctAnswers in Previous",correctAnswers);
					console.log("iSelectedAnswer in Previous",iSelectedAnswer);
					displayCurrentQuestion();
					
				} 					
		} else {
			if(viewingAns == 3) { return false; }
			currentQuestion = 0; viewingAns = 3;
			viewResults();		
		}
    });
	// On clicking next, display the next question
    $(this).find(".nextButton").on("click", function () 
	{
        if (!quizOver) 
		{

			
            var val = $("input[type='radio']:checked").val();
            // alert(val);
            if (val == undefined) 
			{
                $(document).find(".quizMessage").text("Please select an answer");
                $(document).find(".quizMessage").show();
            } 
			else 
			{
                // TODO: Remove any message -> not sure if this is efficient to call this each time....
                $(document).find(".quizMessage").hide();
				if (val == questions[currentQuestion].correctAnswer) 
				{
					correctAnswers++;
					let response={
						"employee_id":'<?php echo $this->session->userdata('employee_id');?>',
						"course_id":'<?php echo $course_id;?>',
						"module_id":questions[currentQuestion].module_id,
						"question_id":questions[currentQuestion].question_id,
						"answer":val,
						"is_correct":'1',
						// "date_time":'<?php date('Y-m-d');?>',
					}
					answer.push(response);
				}else{
					let response={
						"employee_id":'<?php echo $this->session->userdata('employee_id');?>',
						"course_id":'<?php echo $course_id;?>',
						"module_id":questions[currentQuestion].module_id,
						"question_id":questions[currentQuestion].question_id,
						"answer":val,
						"is_correct":'0',
						// "date_time":'<?php date('Y-m-d');?>',
					}
					answer.push(response);
				}
				iSelectedAnswer[currentQuestion] = val;
				console.log("Answer Object",answer);
				console.log("iSelectedAnswer",iSelectedAnswer);
				console.log("correctAnswers",correctAnswers);
				
				currentQuestion++; // Since we have already displayed the first question on DOM ready
				if(currentQuestion >= 1) {
					  $('.preButton').prop("disabled", false);
				}
				if (currentQuestion < questions.length) 
				{
					displayCurrentQuestion();
					
				} 
				else 
				{
					displayScore();
					$('#iTimeShow').html('Quiz Time Completed!');
					$('#timer').html("You scored: " + correctAnswers + " out of: " + questions.length);
					c=185;
					// $(document).find(".preButton").text("View Answer");
					// $(document).find(".nextButton").text("Play Again?");
					$('#submitbtn').show();
					$('.nextButton').hide();
					$('.preButton').hide();
					quizOver = true;
					return false;
					
				}
			}
					
		}	
		else 
		{ // quiz is over and clicked the next button (which now displays 'Play Again?'
			quizOver = false; $('#iTimeShow').html('Time Remaining:'); iSelectedAnswer = [];
			$(document).find(".nextButton").text("Next Question");
			$(document).find(".preButton").text("Previous Question");
			 $(".preButton").attr('disabled', 'disabled');
			resetQuiz();
			viewingAns = 1;
			displayCurrentQuestion();
			hideScore();
		}
    });
});

function submitAnswer(){
// var data_to_send = $.serialize(answer);
$.ajax({
    type: "POST",
    url: "<?php echo SURL;?>admin/submit_assessment",
    data: {info:answer},
    success: function(msg){
    	window.location = "<?php echo SURL;?>admin/home";
        // $('.answer').html(msg);
    }
});

}

function timedCount()
	{
		if(c == 185) 
		{ 
			return false; 
		}
		
		var hours = parseInt( c / 3600 ) % 24;
		var minutes = parseInt( c / 60 ) % 60;
		var seconds = c % 60;
		var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);            
		$('#timer').html(result);
		
		if(c == 0 )
		{
					displayScore();
					$('#iTimeShow').html('Quiz Time Completed!');
					$('#timer').html("You scored: " + correctAnswers + " out of: " + questions.length);
					c=185;
					$(document).find(".preButton").text("View Answer");
					$(document).find(".nextButton").text("Play Again?");
					quizOver = true;
					return false;
					
		}
		
		c = c - 1;
		t = setTimeout(function()
		{
			timedCount()
		},1000);
	}
	
	
// This displays the current question AND the choices
function displayCurrentQuestion() 
{

	if(c == 185) { c = 180; timedCount(); }
    //console.log("In display current Question");
    var question = questions[currentQuestion].question;
    var questionClass = $(document).find(".quizContainer > .question");
    var choiceList = $(document).find(".quizContainer > .choiceList");
    var numChoices = questions[currentQuestion].choices.length;
    // Set the questionClass text to the current question
    $(questionClass).text(question);
    // Remove all current <li> elements (if any)
    $(choiceList).find("li").remove();
    var choice;
	
	
    for (i = 0; i < numChoices; i++) 
	{
        choice = questions[currentQuestion].choices[i];
		
		if(iSelectedAnswer[currentQuestion] == choice) {
			$('<li><input type="radio" class="radio-inline" checked="checked"  value=' + choice + ' name="dynradio" />' +  ' ' + choice  + '</li>').appendTo(choiceList);
		} else {
			$('<li><input type="radio" class="radio-inline" value=' + choice + ' name="dynradio" />' +  ' ' + choice  + '</li>').appendTo(choiceList);
		}
    }
}

function resetQuiz()
{
    currentQuestion = 0;
    correctAnswers = 0;
    hideScore();
}

function displayScore()
{
    $(document).find(".quizContainer > .result").text("You scored: " + correctAnswers + " out of: " + questions.length);
    $(document).find(".quizContainer > .result").show();
}

function hideScore() 
{
    $(document).find(".result").hide();
}

// This displays the current question AND the choices
function viewResults() 
{

	if(currentQuestion == 10) { currentQuestion = 0;return false; }
	if(viewingAns == 1) { return false; }

	hideScore();
    var question = questions[currentQuestion].question;
    var questionClass = $(document).find(".quizContainer > .question");
    var choiceList = $(document).find(".quizContainer > .choiceList");
    var numChoices = questions[currentQuestion].choices.length;
    // Set the questionClass text to the current question
    $(questionClass).text(question);
    // Remove all current <li> elements (if any)
    $(choiceList).find("li").remove();
    var choice;
	
	
	for (i = 0; i < numChoices; i++) 
	{
        choice = questions[currentQuestion].choices[i];
		
		if(iSelectedAnswer[currentQuestion] == choice) {
			if(questions[currentQuestion].correctAnswer == choice) {
				$('<li style="border:2px solid green;margin-top:10px;"><input type="radio" class="radio-inline" checked="checked"  value=' + choice + ' name="dynradio" />' +  ' ' + choice  + '</li>').appendTo(choiceList);
			} else {
				$('<li style="border:2px solid red;margin-top:10px;"><input type="radio" class="radio-inline" checked="checked"  value=' + choice + ' name="dynradio" />' +  ' ' + choice  + '</li>').appendTo(choiceList);
			}
		} else {
			if(questions[currentQuestion].correctAnswer == choice) {
				$('<li style="border:2px solid green;margin-top:10px;"><input type="radio" class="radio-inline" value=' + choice + ' name="dynradio" />' +  ' ' + choice  + '</li>').appendTo(choiceList);
			} else {
				$('<li><input type="radio" class="radio-inline" value=' + choice + ' name="dynradio" />' +  ' ' + choice  + '</li>').appendTo(choiceList);
			}
		}
    }
	
	currentQuestion++;
	
	setTimeout(function()
		{
			viewResults();
		},3000);
}

</script>