@extends('userPages.master')
@section('content')

<link rel="stylesheet" href="{{asset('./assets/css/repair-task.css')}}" />
<div class="repair-task">
    <div
      class="container repair-task1 d-flex justify-content-center align-items-center flex-column pb-5"
    >
      <h1 class="repair-task-heading">Repair Status Track</h1>
      <h5 class="repair-task-h5 mt-md-2">Work Order Number</h5>

      <div class="container repair-task2">
        <div class="row mt-md-3">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-9">
                <input
                  type="text"
                  class="form-control repair-task-input p-3"
                  placeholder="Work Order Number"
                />
              </div>
              <div class="col-md-3 mt-md-0 mt-2">
                <button
                  class="btn btn-outline-secondary repair-task-button py-3 w-100"
                  type="button"
                >
                  Search
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </div>
  </div>

  @endsection

