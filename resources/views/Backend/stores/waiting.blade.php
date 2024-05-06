
<div>
                        <div class="card" >
                            <div class="card-body">
                                @if(session('success'))
                                <div class="alert alert-success mt-4">
                                    {{ session('success') }}
                                </div>
                            @endif
                                <div style="text-align: center; margin: 50px;">
                                    <h1>Vendor Registration Pending Approval</h1>
                                    <p>Your store registration is currently pending approval from the admin.</p>
                                    <p>Please wait patiently. You will be notified once your registration is approved.</p>

                                    <p>For any inquiries, contact support at <a href="mailto:support@example.com">support@example.com</a>.</p>
                                    <td>
                                        <a href="{{ route('checkStatus', ['store' => $store->id]) }}" class="btn-accept btn btn-primary btn-circle">
                                            Check Your Request Status
                                        </a>
                                    </td>


                                    <!-- You can add more information or styling based on your needs -->
                                </div>
                            </div>
                        </div>
    </div>


{{--
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}





