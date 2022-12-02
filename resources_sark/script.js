const quizData = [
    {
        question: "What does the abbreviation HTML stand for?",
        a:"HyperText Markup Language.",
        b:"HighText Markup Language.",
        c:"HyperText Markdown Language.",
        d:"None of the above.",
        correct:"a",
    },
    {
        question: "How many sizes of headers are available in HTML by default?",
        a:"5",
        b:"1",
        c:"6",
        d:"3",
        correct:"c",
    },
    {
        question: "What is the smallest header in HTML by default?",
        a:"h1",
        b:"h2",
        c:"h6",
        d:"h3",
        correct:"c",
    },
    {
        question: "HTML files are saved by default with the extension?",
        a:".html",
        b:".h",
        c:".ht",
        d:"None of the above.",
        correct:"a",
    },
    {
        question: "What is meant by an empty tag in HTML?",
        a:"There is no such concept of an empty tag in HTML",
        b:"An empty tag does not require a closing tag.",
        c:"An empty tag cannot have any content within it.",
        d:"None of the above.",
        correct:"b",
    },
    {
        question: "What are the attributes used to change the size of an image?",
        a:"Width and Height",
        b:"Big and Small",
        c:"Top and Bottom",
        d:"None of the above.",
        correct:"a",
    },
    {
        question: "Which attribute is used to provide a unique name to an HTML element?",
        a:"id",
        b:"class",
        c:"type",
        d:"None of the above.",
        correct:"a",
    },
    {
        question: "Which of the following properties is used to change the font of text?",
        a:"font-family",
        b:"font-size",
        c:"text-align",
        d:"None of the above.",
        correct:"a",
    },
    {
        question: "What tag is used to render an image on a webpage?",
        a:"img",
        b:"src",
        c:"image",
        d:"None of the above.",
        correct:"a",
    },
    {
        question: "What is the correct syntax to write an HTML comment?",
        a:"<!-- Comment -->",
        b:"// Comment",
        c:"# Comment",
        d:"/* Comment */",
        correct:"a",
    },
    {
        question: "Colors are defined in HTML using?",
        a:"RGB values",
        b:"HEX values",
        c:"RGBA values",
        d:"All of the above.",
        correct:"d",
    },
    {
        question: "Which property is used to set colors in HTML?",
        a:"color",
        b:"background-color",
        c:"font-color",
        d:"text-color",
        correct:"a",
    },
    {
        question: "Which property is used to set border colors in HTML?",
        a:"border-color",
        b:"border",
        c:"Both A and B",
        d:"None of the above.",
        correct:"b",
    },
    {
        question: "Which of the following is true about HTML tags?",
        a:"Are case sensitive.",
        b:"Are not case sensitive.",
        c:"Are in uppercase",
        d:"Are in lowercase",
        correct:"b",
    },
    {
        question: "The CSS inside HTML elements usded alongside style attribute is called?",
        a:"Inline CSS",
        b:"Internal CSS",
        c:"External CSS",
        d:"None of the above.",
        correct:"a",
    },
    {
        question: "How many characters can be written in 1KB?",
        a:"1048",
        b:"1024",
        c:"1000",
        d:"None of the above.",
        correct:"b",
    },
];

const quiz = document.getElementById('quiz') 
const answerEls = document.querySelectorAll('.answer') 
const questionEl = document.getElementById('question') 
const a_text = document.getElementById('a_text') 
const b_text = document.getElementById('b_text') 
const c_text = document.getElementById('c_text') 
const d_text = document.getElementById('d_text') 
const submitBtn = document.getElementById('submit') 

let currentQuiz = 0 
let score = 0 

loadQuiz() 


function loadQuiz(){

    deselectAnswers() 
    
    const currentQuizData = quizData[currentQuiz] 
    questionEl.innerText = currentQuizData.question 
    a_text.innerText = currentQuizData.a 
    b_text.innerText = currentQuizData.b 
    c_text.innerText = currentQuizData.c 
    d_text.innerText = currentQuizData.d 
}

function deselectAnswers(){
    answerEls.forEach(answerEl => answerEl.checked = false) 
}

function getSelected(){
    let answer
    answerEls.forEach(answerEl =>{
        if(answerEl.checked){
            answer = answerEl.id 
        }
    }) 
    return answer 
}

submitBtn.addEventListener('click', ()=>{
    const answer = getSelected() 
    if(answer){
        if(answer === quizData[currentQuiz].correct){
            score++ 
        }
        console.log(score);

        currentQuiz++ 

    
    if(currentQuiz < quizData.length){
        loadQuiz() 
    }else{
        let input=document.createElement('input');
        let form=document.createElement('form');
        let submit=document.createElement('button');
        input.name="score";
        input.value=score;
        
        submit.type="submit";
        form.action="./sample.php";
        form.method="post";
        form.appendChild(input);
        form.appendChild(submit);
        quiz.appendChild(form);
        submit.click();

        quiz.innerHTML=`
            <h2>You answered ${score}/${quizData.length} questions correctly</h2>
            <button onclick="window.location='sample.php'">🎉See Leaderboard🎉</button> 
        ` ;
         
    }
    }
})