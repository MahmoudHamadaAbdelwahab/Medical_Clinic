<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/appointment.css">
</head>
<body>

<div class='appointment text-center container py-8 mt-5'>
        <h1>Appointment</h1>
        <div class='container'>
            <div class='appointCart row'>
                <div class='col-md-8 col-lg-6'>
                    <img src="../../imag/gallery/appointment.png" class="img-fluid"/>
                </div>
                <div class='col-md-4 col-lg-6 z-index-2 mt-5'>
                    <form class='row g-3'>
                            <input class='col-md-4' type='form-control form-livedoc-control' placeholder='Name' value={name} onChange={handleName}/>
                            <input class='col-md-4' type='tel' placeholder='Phone' value={phone} onChange={handlePhone}/>
                            <select class='col-md-4' id="inputCategory" value={category} onChange={handleCategory}>
                                <option selected="selected">Select Service</option>
                                <option>cardiac care</option>
                                <option>ent</option>
                                <option>eye</option>
                                <option>heart care</option>
                                <option>neurology</option>
                                <option>osteoporosis</option>
                            </select>
                            <input class='col-md-4' type='email' placeholder='Email' value={email} onChange={handleEmail}/>
                            <textarea placeholder='message' value={message} onChange={handleMessage}></textarea>
                            <button onClick={OnSubmit} class="btn btn-outline-secondary rounded-pill col-md-12" type="submit" fdprocessedid="2znbuu">Sign in</button>
                    </form>
                </div>
                <ToastContainer/>
            </div>
        </div>
    </div>
</body>
</html>

