@extends('userPages.master')
@section('content')

<link rel="stylesheet" href="{{asset('./assets/css/booknow.css')}}" />


<div class="container-fluid booknow-img d-flex align-items-center justify-content-center">
      <div class="booknow-icon">
        <img src="{{asset('assets/img/MobFix1.png')}}" class="" alt="" />
      </div>
    </div>
    <div class="container mt-5">
      <div class="book-para">
        <h4>Details</h4>
      </div>
      <form action="" class="mt-5 mb-5">
        <div class="row">
          <div class="col-md-9 book-menu1">
            <select
              class="form-select form-select-lg mb-3 p-4"
              aria-label="Large select example"
            >
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>

        <div class="form-floating book-textarea">
          <textarea
            placeholder="Please describe your requirement in detail!"
            class="w-100 p-3"
            rows="3"
            id="floatingTextarea"
            row="10"
          ></textarea>
        </div>

        <div class="mt-2 book-menu2 book-form">
          <label for="">Reservation Time:</label>
          <select
            class="form-select form-select-lg mb-3 p-3 mt-2"
            aria-label="Large select example"
          >
            <option selected>Tap to select arrival time</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>

        <div class="mb-3 book-input book-form">
          <label for="exampleFormControlInput1" class="form-label"
            >Full Name:</label
          >
          <input
            type="text"
            class="form-control p-3"
            id="exampleFormControlInput1"
            placeholder="Please enter your full name"
          />
        </div>

        <div class="mb-3 book-input book-form">
          <label for="exampleFormControlInput1" class="form-label"
            >Phone num:</label
          >
          <input
            type="number"
            class="form-control p-3"
            id="exampleFormControlInput1"
            placeholder="Please enter your phone number"
          />
        </div>

        <div class="row">
          <div class="col-lg-7 book-content d-flex">
            <i class="fa-solid fa-circle-exclamation mt-1"></i>
            <p class="mx-3">
              Please enter your correct contact details so that we can reach you
            </p>
          </div>
        </div>
        <div class="mb-3">
          <div class="book-form">
            <label for="exampleFormControlInput1" class="form-label"
              >Delivery:</label
            >
          </div>
          <div>
            <div class="form-check form-check-inline check">
              <input
                class="form-check-input"
                checked
                type="radio"
                name="inlineRadioOptions"
                id="inlineRadio1"
                value="option1"
              />
              <label class="form-check-label" for="inlineRadio1">By Hand</label>
            </div>
            <div class="form-check form-check-inline check">
              <input
                class="form-check-input"
                type="radio"
                name="inlineRadioOptions"
                id="inlineRadio2"
                value="option2"
              />
              <label class="form-check-label" for="inlineRadio2">Uber</label>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-center">
          <button class="btn book-button py-3" type="submit">Submit</button>
          <button class="btn book-button1 mx-1 mx-sm-5 py-3" type="submit">
            Price
          </button>
        </div>
      </form>
    </div>
    @endsection
