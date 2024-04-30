<?php 
    require_once('../../config.php');
    require_once BLA.'inc/nav.php';
?>


    <div className='appointment text-center container py-8 mt-5'>
        <h1>Appointment</h1>
        <div className='container'>
            <div className='appointCart row'>
                <div className='col-md-8 col-lg-6'>
                    <img src={appointment} class="img-fluid"/>
                </div>
                <div className='col-md-4 col-lg-6 z-index-2 mt-5'>
                    <form className='row g-3'>
                            <input className='col-md-4' type='form-control form-livedoc-control' placeholder='Name' value={name} onChange={handleName}/>
                            <input className='col-md-4' type='tel' placeholder='Phone' value={phone} onChange={handlePhone}/>
                            <select className='col-md-4' id="inputCategory" value={category} onChange={handleCategory}>
                                <option selected="selected">Select Service</option>
                                <option>cardiac care</option>
                                <option>ent</option>
                                <option>eye</option>
                                <option>heart care</option>
                                <option>neurology</option>
                                <option>osteoporosis</option>
                            </select>
                            <input className='col-md-4' type='email' placeholder='Email' value={email} onChange={handleEmail}/>
                            <textarea placeholder='message' value={message} onChange={handleMessage}></textarea>
                            <button onClick={OnSubmit} className="btn btn-outline-secondary rounded-pill col-md-12" type="submit" fdprocessedid="2znbuu">Sign in</button>
                    </form>
                </div>
                <ToastContainer/>
            </div>
        </div>
    </div>


<?php
    require_once BLA.'inc/footer.php';
?>
