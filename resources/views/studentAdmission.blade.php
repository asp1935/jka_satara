<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form - JKA India</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Oswald:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #d9230f;
            --secondary-color: #1a1a1a;
            --accent-color: #f0a202;
            --light-bg: #f8f9fa;
            --dark-text: #333;
            --light-text: #f8f9fa;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
            background-image: url('img/image.png');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            padding: 20px 0;
            color: var(--dark-text);
        }

        .container {
            max-width: 900px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            border-left: 5px solid var(--primary-color);
            border-right: 5px solid var(--primary-color);
            margin-bottom: 30px;
        }

        .header {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.05)" d="M0,0 L100,0 L100,100 L0,100 Z" /><path fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="2" stroke-dasharray="5,5" d="M0,50 L100,50 M50,0 L50,100" /></svg>');
            background-size: 50px 50px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .logo {
            width: 21%;
            height: auto;
            object-fit: contain;
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.3));
        }

        .org-name {
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            font-size: 2.2rem;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .org-subtitle {
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 1.1rem;
            margin: 5px 0 0;
            letter-spacing: 0.5px;
        }

        .form-title {
            font-family: 'Oswald', sans-serif;
            font-weight: 600;
            font-size: 2rem;
            color: var(--primary-color);
            text-transform: uppercase;
            margin: 20px 0;
            position: relative;
            text-align: center;
            letter-spacing: 1px;
        }

        .form-title::after {
            content: "";
            display: block;
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            margin: 10px auto;
            border-radius: 2px;
        }

        .form-section {
            padding: 0 30px 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--secondary-color);
            position: relative;
            padding-left: 15px;
        }

        .form-group label::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 8px;
            height: 8px;
            background-color: var(--primary-color);
            border-radius: 50%;
        }

        .form-control {
            border: 2px solid #ddd;
            border-radius: 6px;
            padding: 10px 15px;
            font-size: 1rem;
            transition: all 0.3s;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(217, 35, 15, 0.25);
        }

        .photo-container {
            width: 200px;
            height: 230px;
            border: 3px dashed #ddd;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            background-color: var(--light-bg);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            margin: 0 auto;
        }

        .photo-container:hover {
            border-color: var(--primary-color);
            background-color: rgba(217, 35, 15, 0.05);
        }

        .photo-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .photo-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 15px;
            color: #666;
        }

        .photo-icon {
            font-size: 40px;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .photo-upload-btn {
            margin-top: 15px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
        }

        .photo-upload-btn:hover {
            background-color: #b51c0c;
            transform: translateY(-2px);
        }

        .submit-btn {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            background-size: 200% auto;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            display: block;
            margin: 30px auto 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(217, 35, 15, 0.3);
            width: 250px;
            text-align: center;
        }

        .submit-btn:hover {
            background-position: right center;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(217, 35, 15, 0.4);
        }

        .karate-icon {
            color: var(--primary-color);
            margin-right: 10px;
        }

        .form-divider {
            border: none;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--primary-color), transparent);
            margin: 25px 0;
        }

        /* Camera modal styles */
        .camera-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .camera-video {
            max-width: 80%;
            max-height: 80%;
            border: 3px solid var(--primary-color);
            border-radius: 10px;
        }

        .camera-buttons {
            margin-top: 20px;
            display: flex;
            gap: 20px;
        }

        .camera-capture-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .camera-cancel-btn {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .camera-retake-btn {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: 600;
            display: none;
        }

        .preview-container {
            position: relative;
            max-width: 80%;
            max-height: 80%;
            display: none;
        }

        .preview-image {
            max-width: 100%;
            max-height: 80vh;
            border: 3px solid var(--primary-color);
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .org-name {
                font-size: 1.8rem;
            }

            .org-subtitle {
                font-size: 0.9rem;
            }

            .form-title {
                font-size: 2rem;
            }

            .form-section {
                padding: 0 20px 20px;
            }

            .photo-container {
                width: 180px;
                height: 210px;
            }

            .camera-video,
            .preview-image {
                max-width: 95%;
            }

            .camera-buttons {
                flex-direction: column;
                gap: 10px;
            }
        }

        /* Modal styles to match form design */
        .modal-content {
            border-radius: 15px;
            overflow: hidden;
            border-left: 5px solid var(--primary-color);
            border-right: 5px solid var(--primary-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.98);
        }

        .modal-header {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            color: white;
            /* padding: 20px; */
            border-bottom: none;
            position: relative;
            overflow: hidden;
        }

        .modal-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.05)" d="M0,0 L100,0 L100,100 L0,100 Z" /><path fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="2" stroke-dasharray="5,5" d="M0,50 L100,50 M50,0 L50,100" /></svg>');
            background-size: 50px 50px;
        }

        .modal-title {
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.8;
        }

        .btn-close:hover {
            opacity: 1;
        }

        .modal-body {
            padding: 25px;
            font-family: 'Montserrat', sans-serif;
        }

        .modal-body h4 {
            font-family: 'Oswald', sans-serif;
            color: var(--primary-color);
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: 600;
            position: relative;
            margin-top: -8px;
            /* padding-bottom: 10px; */
        }

        .modal-body h4::after {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            margin-top: 10px;
            border-radius: 2px;
        }

        .modal-body ol {
            padding-left: 20px;
        }

        .modal-body li {
            margin-bottom: 13px;
            line-height: 1.6;
        }

        .modal-body li strong {
            color: var(--primary-color);
        }

        .form-check {
            /* margin-top: 25px; */
            padding-left: 30px;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            margin-top: 0.25rem;
            margin-left: -30px;
            border: 2px solid var(--primary-color);
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-label {
            font-weight: 500;
            margin-left: 10px;
        }

        .modal-footer {
            border-top: none;
            /* padding: 20px; */
            background-color: var(--light-bg);
        }

        .modal-footer .btn {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .modal-footer .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
            border: none;
        }

        .modal-footer .btn-secondary:hover {
            background-color: #333;
            transform: translateY(-2px);
        }

        .modal-footer .btn-primary {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .modal-footer .btn-primary:hover {
            background-color: #b51c0c;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo-container"><img src="img/logo.png" alt="JKA Logo" class="logo"></div>
            <h1 class="org-name">Japan Karate Association</h1>
            <p class="org-subtitle">India - Maharashtra District,
                Satara</p>
        </div>

        <div class="form-section">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">

                    <strong>{{ session()->get('success') }} </strong>
                </div>
            @endif
            <h2 class="form-title"><i class="fas fa-user-plus karate-icon"></i>Admission Form </h2>
            <form id="admissionForm" action="{{ route('admission') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter your full name" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"
                                placeholder="Your complete address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="photo-container" id="photoContainer">
                                <img id="photoPreview" class="photo-preview" alt="Preview">
                                <div class="photo-placeholder" id="photoPlaceholder">
                                    <i class="fas fa-camera photo-icon"></i>
                                    <p>Click to Take Photo</p>
                                    <button type="button" class="photo-upload-btn" id="openCameraBtn">
                                        <i class="fas fa-camera"></i> Open Camera
                                    </button>
                                </div>
                            </div>
                            <input type="file" id="photoInput" name="photo" accept="image/*" style="display: none;">

                        </div>
                        <div class="form-group">
                            <label for="occupation">Occupation</label>
                            <input type="text" class="form-control" id="occupation" name="occupation"
                                placeholder="Your profession" required>
                        </div>
                    </div>
                </div>
                <hr class="form-divider">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" id="age" name="age" placeholder="Your age" required
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="height">Height (cm)</label>
                            <input type="text" class="form-control" id="height" name="height"
                                placeholder="Height in centimeters" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="XXXXXXXXXX"
                                pattern="[0-9]{10}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="education">Education</label>
                            <input type="text" required class="form-control" id="education" name="education"
                                placeholder="Your education level" required>
                        </div>
                        <div class="form-group">
                            <label for="blood-group">Blood Group</label>
                            <select class="form-control" id="blood-group" name="bloodgroup" required>
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight (kg)</label>
                            <input type="text" class="form-control" id="weight" name="weight" pattern="[0-9]{2-3}"
                                placeholder="Weight in kilograms" required>
                        </div>
                    </div>
                </div>
                <hr class="form-divider">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="branch">Branch</label>
                            <select class="form-control" required id="branch" name="branch_id">
                                <option value="">Select Your Branch</option>
                                <option value="1">Satara</option>
                                <option value="2">Pune</option>
                                <option value="3">Mumbai</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="sub-branch">Sub Branch</label>
                            <select class="form-control" id="sub-branch" name="sub_branch_id" disabled required>
                                <option value="">Select Branch First</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="submit-btn"><i class="fas fa-paper-plane"></i>Submit</button>
            </form>
        </div>
    </div>

    <!-- Add this right before the closing </body> tag -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Japan Karate Association - Membership Terms</h4>
                    <ol>
                        <li>I Voluntarily wants to entered in your Association. </li>
                        <li>I obey all rules and regulations followed by the Association. .</li>
                        <li>If any misbehaviour happens it will worthy of our punishment. </li>
                        <li>During the JKA training I never neglect the study of the school .</li>
                        <li>By mistake anyone physically injured during the session. Then association or trainer
                            themsleves not responsible for that. </li>
                        <li>Be in a proper Karate dress is a mendatory for all students. </li>
                        <li>Monthly fees only - or Annual fees only /-(Once a paid fees will not be refundable) </li>
                        <li>I accept all rules and regulation mentioned by association. </li>
                        <li>For complaint please consult our Head Instructor.</li>
                    </ol>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                        <label class="form-check-label" for="agreeTerms">
                            I have read and agree to the terms and conditions
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmSubmit">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Photo capture functionality
        const photoContainer = document.getElementById('photoContainer');
        const photoPreview = document.getElementById('photoPreview');
        const photoPlaceholder = document.getElementById('photoPlaceholder');
        const photoInput = document.getElementById('photoInput');
        let stream = null;
        let photoFile = null;

        // Open camera when clicking anywhere in the photo container
        photoContainer.addEventListener('click', function () {
            startCamera();
        });

        function startCamera() {
            // Stop any existing stream
            if (stream) {
                stopCamera();
            }

            // Check if browser supports mediaDevices
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                alert('Camera access is not supported by your browser');
                return;
            }

            // Create camera modal
            const cameraModal = document.createElement('div');
            cameraModal.className = 'camera-modal';

            const video = document.createElement('video');
            video.className = 'camera-video';
            video.autoplay = true;
            video.playsInline = true;

            const previewContainer = document.createElement('div');
            previewContainer.className = 'preview-container';

            const previewImage = document.createElement('img');
            previewImage.className = 'preview-image';
            previewContainer.appendChild(previewImage);

            const buttonContainer = document.createElement('div');
            buttonContainer.className = 'camera-buttons';

            const captureBtn = document.createElement('button');
            captureBtn.className = 'camera-capture-btn';
            captureBtn.innerHTML = '<i class="fas fa-camera"></i> Capture';

            const retakeBtn = document.createElement('button');
            retakeBtn.className = 'camera-retake-btn';
            retakeBtn.innerHTML = '<i class="fas fa-redo"></i> Retake';

            const cancelBtn = document.createElement('button');
            cancelBtn.className = 'camera-cancel-btn';
            cancelBtn.innerHTML = '<i class="fas fa-times"></i> Cancel';

            buttonContainer.appendChild(captureBtn);
            buttonContainer.appendChild(retakeBtn);
            buttonContainer.appendChild(cancelBtn);

            cameraModal.appendChild(video);
            cameraModal.appendChild(previewContainer);
            cameraModal.appendChild(buttonContainer);
            document.body.appendChild(cameraModal);

            // Get camera stream
            navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: 'user',
                    width: { ideal: 1280 },
                    height: { ideal: 720 }
                },
                audio: false
            }).then(function (mediaStream) {
                stream = mediaStream;
                video.srcObject = stream;
            }).catch(function (err) {
                console.error("Error accessing camera: ", err);
                alert('Could not access the camera. Please make sure you have granted camera permissions.');
                document.body.removeChild(cameraModal);
            });

            // Capture photo
            captureBtn.addEventListener('click', function () {
                const canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

                // Convert to blob
                canvas.toBlob(function (blob) {
                    // Create a file from the blob
                    photoFile = new File([blob], 'profile-photo.jpg', { type: 'image/jpeg' });

                    // Show preview
                    const imageUrl = URL.createObjectURL(blob);
                    previewImage.src = imageUrl;
                    previewContainer.style.display = 'block';
                    video.style.display = 'none';
                    captureBtn.style.display = 'none';
                    retakeBtn.style.display = 'block';
                }, 'image/jpeg', 0.9);
            });


            // Retake photo
            retakeBtn.addEventListener('click', function () {
                previewContainer.style.display = 'none';
                video.style.display = 'block';
                captureBtn.style.display = 'block';
                retakeBtn.style.display = 'none';
            });

            // Confirm photo
            cancelBtn.addEventListener('click', function () {
                if (previewImage.src && previewContainer.style.display === 'block') {
                    // User has taken a photo
                    photoPreview.src = previewImage.src;
                    photoPreview.style.display = 'block';
                    photoPlaceholder.style.display = 'none';
                }

                // Clean up
                stopCamera();
                document.body.removeChild(cameraModal);
            });
        }

        function stopCamera() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                stream = null;
            }
        }

        // Age calculation from DOB
        const dobInput = document.getElementById('dob');

        const today = new Date();
        const threeYearsAgo = new Date(today.getFullYear() - 3, today.getMonth(), today.getDate());

        // Format date as YYYY-MM-DD for input[type=date]
        const yyyy = threeYearsAgo.getFullYear();
        const mm = String(threeYearsAgo.getMonth() + 1).padStart(2, '0');
        const dd = String(threeYearsAgo.getDate()).padStart(2, '0');
        const maxDate = `${yyyy}-${mm}-${dd}`;

        dobInput.setAttribute('max', maxDate);

        const ageInput = document.getElementById('age');

        dobInput.addEventListener('change', function () {
            if (this.value) {
                const dob = new Date(this.value);
                const today = new Date();
                let age = today.getFullYear() - dob.getFullYear();
                const monthDiff = today.getMonth() - dob.getMonth();

                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }

                ageInput.value = age;
            }
        });

        // Branch and Sub-branch functionality
        const branchSelect = document.getElementById('branch');
        const subBranchSelect = document.getElementById('sub-branch');

        const subBranches = {
            '1': ['Satara City', 'Wai', 'Karad', 'Phaltan'],
            '2': ['Pune City', 'Pimpri-Chinchwad', 'Hadapsar', 'Kothrud'],
            '3': ['Mumbai City', 'Thane', 'Navi Mumbai', 'Bandra']
        };

        branchSelect.addEventListener('change', function () {
            const selectedBranch = this.value;
            subBranchSelect.innerHTML = '';
            subBranchSelect.disabled = true;

            if (selectedBranch) {
                subBranchSelect.disabled = false;
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Select Sub Branch';
                subBranchSelect.appendChild(defaultOption);

                subBranches[selectedBranch].forEach(function (subBranch, index) {
                    const option = document.createElement('option');
                    option.value = index
                    option.textContent = subBranch;
                    subBranchSelect.appendChild(option);
                });
            } else {
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Select Branch First';
                subBranchSelect.appendChild(defaultOption);
            }
        });

        // Form submission handling
        const admissionForm = document.getElementById('admissionForm');
        // const formDataPreview = document.getElementById('formDataPreview');
        // const previewContent = document.getElementById('previewContent');

        admissionForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Show the terms modal
            const termsModal = new bootstrap.Modal(document.getElementById('termsModal'));
            termsModal.show();
        });

        // Handle the confirmation button in the modal
        document.getElementById('confirmSubmit').addEventListener('click', function () {
            const agreeCheckbox = document.getElementById('agreeTerms');

            if (!agreeCheckbox.checked) {
                alert('Please agree to the terms and conditions before submitting.');
                return;
            }

            // Hide the terms modal
            const termsModal = bootstrap.Modal.getInstance(document.getElementById('termsModal'));
            termsModal.hide();

            // Create FormData object
            const formData = new FormData(document.getElementById('admissionForm'));

            // Add photo file if captured
            if (photoFile) {
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(photoFile);
                document.getElementById('photoInput').files = dataTransfer.files;
            }

            // Display the form data
            // displayFormData(formData);
            document.querySelector('form').submit();


            // Scroll to preview
            // formDataPreview.scrollIntoView({ behavior: 'smooth' });
        });

        // // Modify the existing script section to add this code at the bottom

        // // Terms and conditions modal handling
        // document.querySelector('form').addEventListener('submit', function (e) {
        //     e.preventDefault(); // Prevent form from submitting directly


        //     // Show the terms modal
        //     const termsModal = new bootstrap.Modal(document.getElementById('termsModal'));
        //     termsModal.show();
        // });

        // // Handle the confirmation button in the modal
        // document.getElementById('confirmSubmit').addEventListener('click', function () {
        //     const agreeCheckbox = document.getElementById('agreeTerms');

        //     if (!agreeCheckbox || !agreeCheckbox.checked) {
        //         alert('Please agree to the terms and conditions before submitting.');
        //         return;
        //     }

        //     // If terms are agreed, submit the form

        //     const admissionForm = document.querySelector('form')

        //     const formData = new FormData(admissionForm);
        //     console.log(admissionForm, formData);


        //     if (window.capturedPhotoFile) {
        //         formData.set('photo', window.capturedPhotoFile); // override the hidden input
        //     }

        //     // Send with fetch
        //     fetch(admissionForm.action, {
        //         method: admissionForm.method,
        //         body: formData
        //     })
        //         .then(async response => {
        //             if (response.status == 200) {
        //                 alert('Form submitted successfully!');

        //                 // const termsModal = new bootstrap.Modal(document.getElementById('termsModal'));
        //                 // termsModal.hide();
        //                 // // ✅ Reset the form
        //                 // admissionForm.reset();

        //                 // // ✅ Optionally clear the preview image
        //                 // photoPreview.src = '';
        //                 // photoPreview.style.display = 'none';
        //                 // photoPlaceholder.style.display = 'block';

        //                 // // ✅ Optionally reset any dynamic elements
        //                 // subBranchSelect.innerHTML = '<option value="">Select Branch First</option>';
        //                 // subBranchSelect.disabled = true;

        //                 // // ✅ Clear the global photo file
        //                 // window.capturedPhotoFile = null;
        //                 // // Show the terms modal

        //                 window.location.reload();

        //             }
        //         })
        //         .catch(err => {
        //             console.error('Submission error:', err);
        //             alert('Form submission failed.');
        //         });
        // });
    </script>
</body>

</html>