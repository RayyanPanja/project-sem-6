const ObserverForMails = new IntersectionObserver((entries)=>{
    entries.forEach((entry)=>{
        if(entry.isIntersecting){
            entry.target.classList.add('slide');
        }
    })
},{threshold: 0.6});

const MailArray = document.querySelectorAll('.mail-wrapper');

MailArray.forEach((mail)=>{
    console.log("Hello");
    ObserverForMails.observe(mail);
});