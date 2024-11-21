<?php

class HorarioCRUD extends ProgramaBase
{
    const LIMITE_SCROLL = 5;

    function __construct()
                {
        $this->horario = new Horario();
                
        parent::__construct($this->horario);
            
    
    }

    function main()
    {
        return '
        <section class="pt-6 bg-600" id="home">
            <div class="container">
            <form action="/action_page.php">
                <label for="cars">Choose a car:</label>
                <select name="cars" id="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="opel">Opel</option>
                    <option value="audi">Audi</option>
                </select>
                <br><br>
                <input type="submit" value="Submit">
            </form> 
            <div class="row align-items-center">
                <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end"></div>
                <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
                <h4 class="fw-bold font-sans-serif">Become Master</h4>
                <h2 class="fs-6 fs-xl-7 mb-5">Learn New Skills Online Find Best Courses</h2><a class="btn btn-primary me-2" href="#!" role="button">Get A Quote</a><a class="btn btn-outline-secondary" href="#!" role="button">Read more</a>
                </div>
            </div>
            
            </div>
        </section>
  ';
    }

    function elegirCiclo()
    {
        echo("CURSOS");
        return '
            Cursos:
        ';
    }


}