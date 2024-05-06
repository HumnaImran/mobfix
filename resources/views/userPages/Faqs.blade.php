@extends('userPages.master')
@section('content')

<style>
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
.Privacytext{
    font-family: Segoe UI;
font-size: 35px;
font-weight: 600;
line-height: 53px;
text-align: left;
color: black;
}
.ParagraphText{
    background-color: #f3f1f1;
}
.Text-privacy{
    color: black;
    font-family: Segoe UI;
font-size: 14px;
font-weight: 400;
line-height: 20px;

}
.WalleT{
    font-family: Segoe UI;
font-size: 30px;
font-weight: 600;
line-height: 30px;
letter-spacing: 0px;
text-align: left;

}
.Walletbalance{
    font-family: Segoe UI;
font-size: 16px;
font-weight: 400;
line-height: 21px;
text-align: left;
}
.Balanced{
    font-family: Segoe UI;
font-size: 20px;
font-weight: 600;
line-height: 32px;
letter-spacing: 0px;
text-align: left;

}
.TableBody{
    background-color: #f3f1f1;
}
.Tableborder{
    border: 2px solid white !important;
}
.tABBLEHEADER{
    border: 1px solid #f3f1f1 !important;
    border-top: 10px;
}
.BTN{
    background-color:#F6A92C !important;
    color: white !important;
    border-radius:10px ;
}
 /* faqs css*/
 .FAQSsection2{
    background-color: #f3f1f1;
    border-radius: 12px;

 }
 .BAKSections{
    position: absolute;
    top: 80%;
    left: 15%;
    width: 70%;
 }
 @media(max-width:520px){
    .BAKSections{
        top: 60%;
        width: 80%;
        left: 10%;
    }
 }
 @media(max-width:397px){
    .BAKSections{
        top: 40%;
        width: 90%;
        left: 5%;
    }
 }
 @media(max-width:992px){
    .SecTions4{
        margin-top: 40% !important;
     }
 }
 @media(max-width:857px){
    .SecTions4{
        margin-top: 50% !important;
     }
 }
 @media(max-width:767px){
    .SecTions4{
        margin-top: 60% !important;
     }
     .PrivacyTEXT{
        font-size: 25px;
     }
 }
 @media(max-width:660px){
    .SecTions4{
        margin-top: 80% !important;
     }
 }
 @media(max-width:600px){
    .SecTions4{
        margin-top: 90% !important;
     }
 }
 @media(max-width:550px){
    .SecTions4{
        margin-top: 100% !important;
     }
 }
 @media(max-width:440px){
    .SecTions4{
        margin-top: 120% !important;
     }
 }
 @media(max-width:360px){
    .SecTions4{
        margin-top: 140% !important;
     }
     .PrivacyTEXT{
        font-size: 16px;
     }
 }
 .SecTions4{
    margin-top: 20% ;
    margin-bottom: 5%;
 }
 .PrivacyTEXT{
    font-family: Segoe UI;
    font-size: 35px;
    font-weight: 600;
    /* line-height: 20px; */
    text-align: left;
    color: black;
 }
.accordion-button{
    font-size: 20px;
    font-weight: 600;
    color: black;
}

/* news css */
.mainSections {
    background-image: url('../img/Rectangle\ 1128.png');
    background-repeat: no-repeat;
    background-size: cover;
    width: 100% !important;
    height: 60vh !important;
    background-position: 100% 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.mainSections h2{
    font-family: Segoe UI;
font-size: 35px;
font-weight: 700;
line-height: 64px;
letter-spacing: 0em;
color: white;

}
.REVIES{
    color: #F6A92C;
}
.Privacyhiden{
    font-family: Segoe UI;
font-size: 24px;
font-weight: 600;
line-height: 32px;
letter-spacing: 0em;
text-align: left;
color: black;

}
    </style>


<link rel="stylesheet" href="{{asset('./assests/css/privacy2.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="position-relative ">
    <img class="w-100 " src="{{asset('assets/img/11376101_4748242 1.png')}}" alt="">

</div>
<div class="container    px-3">
    <div class="BAKSections">
        <div class="row py-4 px-3  FAQSsection2  ">
            <div class="col-lg-4">
                <img class="w-50 my-3 " src=" {{asset('assets/img/octicon_question-24.png')}}" alt="">

            </div>
            <div class="col-lg-8 my-3 ">
                <h2>Commonly Encountered Questions</h2>
                <p>Presented below are several of the inquiries that we typically encounter most frequently from our
                    users; if you cannot find the information you seek, please feel free to reach out to us via
                    phone, chat, or email at your convenience.</p>
            </div>
        </div>
    </div>
</div>
<div class="container position-relative pb-4 SecTions4">
    <h2 class="PrivacyTEXT py-3">Have any questions? Read popular <span class="fw-bold "> answers</span> below</h2>
    <div class="accordion w-100" id="basicAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#basicAccordionCollapseOne" aria-expanded="false"
                    aria-controls="basicAccordionCollapseOne">
                    How can vendors join the platform?
                </button>
            </h2>
            <div id="basicAccordionCollapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                    <p class="Text-privacy"> Vendors can join the platform by filling out a registration form and submitting necessary documentation for verification. Once approved by the admin, they can set up their profiles and start offering services.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#basicAccordionCollapseTwo" aria-expanded="false"
                    aria-controls="basicAccordionCollapseTwo">
                    How can customers book a repair service?
                </button>
            </h2>
            <div id="basicAccordionCollapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                    <p class="Text-privacy"> Customers can book repair services through the platform by browsing available services, selecting a vendor/store, and submitting neccessary information and deliver the mobile by requesting courier service from platform.</p>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#basicAccordionCollapseThree" aria-expanded="false"
                    aria-controls="basicAccordionCollapseThree">
                     Can customers track the status of their repair orders?
                </button>
            </h2>
            <div id="basicAccordionCollapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                    <p class="Text-privacy"> Yes, customers can track the status of their repair orders in real-time through their accounts on the platform by clicking the track button agianst the relvant order </p>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#basicAccordionCollapseFour" aria-expanded="false"
                    aria-controls="basicAccordionCollapseFour">
                    Are there reporting features to track sales, revenue, and customer feedback?
                </button>
            </h2>
            <div id="basicAccordionCollapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                    <p class="Text-privacy">Yes, the platform offers reporting features that allow admins to track sales, revenue, customer feedback, and other key metrics. Reports can be generated and analyzed to gain insights into business performance.</p>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#basicAccordionCollapseFive" aria-expanded="false"
                    aria-controls="basicAccordionCollapseFive">
                    Can customers leave reviews and ratings for repair services?
                </button>
            </h2>
            <div id="basicAccordionCollapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                    <p class="Text-privacy"> Absolutely. Customers can leave reviews and ratings for the repair services they've received. This feedback helps maintain service quality and assists other customers in making informed decisions.</p>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#basicAccordionCollapsesix" aria-expanded="false"
                    aria-controls="basicAccordionCollapsesix">
                    How are reviews and ratings used to maintain service quality?
                </button>
            </h2>
            <div id="basicAccordionCollapsesix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                    <p class="Text-privacy">Reviews and ratings provide valuable insights into the quality of services offered by vendors. Admins use this feedback to identify areas for improvement, address customer concerns, and ensure high standards of service across the platform.</p>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingseven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#basicAccordionCollapseseven" aria-expanded="false"
                    aria-controls="basicAccordionCollapseseven">
                    How can customers find specific repair services or vendors?
                </button>
            </h2>
            <div id="basicAccordionCollapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                    <p class="Text-privacy">Customers can use the platform's advanced search and filtering options to search for specific repair services or vendors based on criteria such as location, service type, pricing, and ratings.</p>

                </div>
            </div>
        </div>



        <div class="accordion-item">
            <h2 class="accordion-header" id="headingtwelve">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#basicAccordionCollapsetwelve" aria-expanded="false"
                    aria-controls="basicAccordionCollapsetwelve">
                    How can customers find specific repair services or vendors?
                </button>
            </h2>
            <div id="basicAccordionCollapsetwelve" class="accordion-collapse collapse" aria-labelledby="headingtwelve"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                    <p class="Text-privacy">Customers can use the platform's advanced search and filtering options to search for specific repair services or vendors based on criteria such as location, service type, pricing, and ratings.</p>

                </div>
            </div>
        </div>


        <div class="accordion-item">
            <h2 class="accordion-header" id="headingnine">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#basicAccordionCollapsenine" aria-expanded="false"
                    aria-controls="basicAccordionCollapsenine">
                    Are there advanced search options and filters to narrow down options?
                </button>
            </h2>
            <div id="basicAccordionCollapsenine" class="accordion-collapse collapse" aria-labelledby="headingnine"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                    <p class="Text-privacy">Yes, the platform provides advanced search options and filters to help customers narrow down their options and find the most suitable repair services or vendors. This includes filters for service type, location, availability, and more.</p>

                </div>
            </div>
        </div>





        <div class="accordion-item">
            <h2 class="accordion-header" id="headingeight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#basicAccordionCollapseeight" aria-expanded="false"
                    aria-controls="basicAccordionCollapseeight">
                    Can vendors manage their profiles and services independently?
                </button>
            </h2>
            <div id="basicAccordionCollapseeight" class="accordion-collapse collapse" aria-labelledby="headingeight"
                data-bs-parent="#basicAccordion">
                <div class="accordion-body">
                    <p class="Text-privacy">Yes, vendors have access to a dashboard where they can manage their profiles, update service listings, set prices, view orders, and communicate with customers.</p>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script> --}}
@endsection
