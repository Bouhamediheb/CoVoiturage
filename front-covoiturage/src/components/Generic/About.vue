<template>
    <nav>
        <div class="ribbon">
            <div class="container">
                <router-link to="/" class="nav-link">Home</router-link>
                <span class="separator">/</span>
                <router-link to="/about" class="nav-link">About</router-link>
            </div>
        </div>
    </nav>

    <!-- about page content-->

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <fieldset class="rounded p-4 custom-border">
                    <legend class="legend-label">About Us</legend>
                    <p>
                        CoVoiturage is a carpooling platform that connects drivers and passengers. It is a platform that
                        allows drivers to share their rides with passengers who are going in the same direction. It is a
                        platform that allows passengers to find rides to their destination. It is a platform that allows
                        drivers to earn money by sharing their rides. It is a platform that allows passengers to save
                        money by sharing rides. It is a platform that allows drivers to meet new people. It is a
                        platform that allows passengers to meet new people. It is a platform that allows drivers to
                        reduce their carbon footprint. It is a platform that allows passengers to reduce their carbon
                        footprint. It is a platform that allows drivers to travel in the carpool lane. It is a platform
                        that allows passengers to travel in the carpool lane. It is a platform that allows drivers to
                        travel faster. It is a platform that allows passengers to travel faster. It is a platform that
                        allows drivers to travel more comfortably. It is a platform that allows passengers to travel
                        more comfortably. It is a platform that allows drivers to travel more safely. It is a platform
                        that allows passengers to travel more safely. It is a platform that allows drivers to travel
                        more affordably. It is a platform that allows passengers to travel more affordably. It is a
                        platform that allows drivers to travel more conveniently. It is a platform that allows
                        passengers to travel more conveniently. It is a platform that allows drivers to travel more
                        flexibly. It is a platform that allows passengers to travel more flexibly. It is a platform that
                        allows drivers to travel more efficiently. It is a platform that allows passengers to travel
                        more efficiently. It is a platform that allows drivers to travel more sustainably. It is a
                        platform that allows passengers to travel more sustainably. It is a platform that allows drivers
                        to travel more responsibly. It is a platform that allows passengers to travel more responsibly.
                        It is a platform that allows drivers to travel more ethically. It is a platform that allows
                        passengers to travel more ethically. It is a platform that allows drivers to travel more
                        environmentally friendly. It is a platform that allows passengers to travel more environmentally
                        friendly. It is a platform that
                    </p>
                </fieldset>
            </div>
        </div>
    </div>





</template>


<style scoped>
:root {
    --yellow: #EBB14D;
    --darkblue: #3A3C6C;
    --light: #cfd8ef;
    --white: #fff;
}

.custom-border {
    border: 1px solid #ced4da;
}

.legend-label {
    font-size: 1.2rem;
    color: var(--darkblue);
}

.save-change {
    background: #EBB14D;
    color: white;
    border: none;
    font-size: 16px;
    float: right;
    cursor: pointer;
    width: 200px;
}

nav {
    margin-left: 22%;
    margin-right: 22%;
    border-radius: 40%;
    border-color: 1px solid #ced4da;
}

.ribbon {
    color: white;
    padding: 10px 0;
    margin-top: 10px;
    border-radius: 10px;
    /* Add border radius */
    border: 1px solid #ced4da;
    /* Add border */


}

.ribbon .container {
    display: flex;
    justify-content: flex-start;
    /* Align links to the left */
}

.ribbon .container .nav-link {
    color: black;
    text-decoration: none;
    transition: color 0.3s ease;
    margin-right: 10px;
    /* Add space between links */
}

.ribbon .container .separator {
    margin-top: 5px;
    color: black;
    margin-right: 10px;
    /* Add space between links */
}

.ribbon .container .nav-link:hover {
    color: var(--darkblue)
}
</style>

<script>




</script>