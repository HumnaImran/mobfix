
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
/>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>

        <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1>
        <p>Your deposit was completed successfully. Thank you for choosing our platform!</p><br/> we'll be in touch shortly!</p>
        <ul>
            <li style="list-style: none">Your updated wallet balance is now available in your account.</li>
            <li style="list-style: none">You can view your transaction history and account details in your profile.</li>
            <li style="list-style: none">Use your newly deposited funds to make purchases, investments, or transfers as needed.</li>
            <li style="list-style: none">If you encounter any issues or have questions, don't hesitate to contact our customer support team.</li>
        </ul>

        <p>We appreciate your business and look forward to serving you in the future. Have a great day!</p>

        <p>For your safety, please be sure to sign out of your account if you're using a public or shared device.</p>

        <div class="actions" style="width:50%; margin:auto; display: flex; justify-content:center; align-items:center">
            <i class="fa-solid fa-arrow-left" style="font-size: 24px; margin-right:2rem;"></i>
            <a href="{{route('YourProfile')}}" class="btn">Back To Profile</a>
        </div>
      </div>


    </body>

