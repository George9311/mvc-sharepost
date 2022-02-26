<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- <div class="jumbotron-fluid text-center">

    <div class="container">
        <div class="card-body">
            <h1 class="display-4"><?php echo $data['title']; ?></h1>

            <p class="lead"> <?php echo $data['description']; ?>
            </p>
        </div>
    </div>
</div>
<form action="<?php echo URLROOT; ?>/sort" method="POST">
    <div class="container">
        <h3 class="heading mt-5 text-center"><?php echo $data['searchTitle']; ?></h3>
        
        <div class="input-group">
            <input type="text" name="search" class="form-control rounded" placeholder="Cauta..." aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" name="submit-search" class="btn btn-outline-primary"><i class="fas fa-search"></i> Cauta Acum</button>
        </div>
    </div>
</form>
 -->




<div id="booking" class="container">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="booking-cta">
                        <h1><?php echo $data['title']; ?></h1>
                        <p><?php echo $data['searchTitle']; ?></p>
                        <p><?php echo $data['description']; ?></p>
                    </div>
                </div>
                <div class="col-md-7 col-md-offset-1 mt-5">
                    <div class="booking-form">
                        <form method="GET" action="<?php echo URLROOT; ?>/pages/search">
                            <div class="form-group">
                                <div class="form-checkbox">
                                    <label for="roundtrip">
                                        <input type="radio" id="roundtrip" name="flight-type">
                                        <span></span>Roundtrip
                                    </label>
                                    <label for="one-way">
                                        <input type="radio" id="one-way" name="flight-type">
                                        <span></span>One way
                                    </label>
                                    <label for="multi-city">
                                        <input type="radio" id="multi-city" name="flight-type">
                                        <span></span>Multi-City
                                    </label>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="city_selector js-states form-control">
                                            <option></option>
                                            <option value="bucuresti"class="fa-solid fa-location-dot"> Bucuresti</option>
                                            <option value="cluj-napoca" data-icon="fa-map-marker"> Cluj-Napoca</option>
                                         
                                        </select>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <span class="form-label">Flyning to</span>
                                        <input class="form-control" type="text" placeholder="City or airport">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                               
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Adults (18+)</span>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Children (0-17)</span>
                                        <select class="form-control">
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span class="form-label">Travel class</span>
                                        <select class="form-control">
                                            <option>Economy class</option>
                                            <option>Business class</option>
                                            <option>First class</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-btn">
                                
                                <input type="submit" name="search" class="submit-btn" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>