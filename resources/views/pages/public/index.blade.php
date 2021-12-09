@extends('layouts.main')
@section('container')
<!-- Masthead-->
    <header class="masthead">
      <div class="container">
        <div
          class="masthead-heading"
          style="
            font-size: 30px;
            font-family: Perpetua Titling MT;
            line-height: 1.5;
          "
        >
          brings the old fashioned <br />barbershop experience<br />
          with the finest barber's
        </div>
        <a
        class="btn btn-primary btn-lg me-4"
        style="
          background-color: #eeb35b;
          font-family: Palatino Linotype;
          border-style: solid;
          border-width: thin;
          color: #131311;
        "
        {{-- href="/appointment" --}}
        data-bs-toggle="modal"
        href="#chooselocation"
          >Make Appointment</a
        >
        <a
          class="btn btn-primary btn-lg"
          href="#services"
          style="
            background-color: #131311;
            font-family: Palatino Linotype;
            color: #eeb35b;
            border-style: solid;
            border-width: thin;
          "
          href="#contact"
          >Contact Us</a
        >
      </div>
    </header>
    <section class="page-section" id="about">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">About</h2>
          <h3 class="section-subheading text-muted">
            Lorem ipsum dolor sit amet consectetur.
          </h3>
        </div>
        <ul class="timeline">
          <li>
            <div class="timeline-image">
              <img
                class="rounded-circle img-fluid"
                src="assets2/img/about/1.jpg"
                alt="..."
              />
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4>2009-2011</h4>
                <h4 class="subheading">Our Humble Beginnings</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt
                  ut voluptatum eius sapiente, totam reiciendis temporibus qui
                  quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                  dolore laudantium consectetur!
                </p>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-image">
              <img
                class="rounded-circle img-fluid"
                src="assets2/img/about/2.jpg"
                alt="..."
              />
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4>March 2011</h4>
                <h4 class="subheading">An Agency is Born</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt
                  ut voluptatum eius sapiente, totam reiciendis temporibus qui
                  quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                  dolore laudantium consectetur!
                </p>
              </div>
            </div>
          </li>
          <li>
            <div class="timeline-image">
              <img
                class="rounded-circle img-fluid"
                src="assets2/img/about/3.jpg"
                alt="..."
              />
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4>December 2015</h4>
                <h4 class="subheading">Transition to Full Service</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt
                  ut voluptatum eius sapiente, totam reiciendis temporibus qui
                  quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                  dolore laudantium consectetur!
                </p>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-image">
              <img
                class="rounded-circle img-fluid"
                src="assets2/img/about/4.jpg"
                alt="..."
              />
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4>July 2020</h4>
                <h4 class="subheading">Phase Two Expansion</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt
                  ut voluptatum eius sapiente, totam reiciendis temporibus qui
                  quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                  dolore laudantium consectetur!
                </p>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-image">
              <h4>
                Be Part
                <br />
                Of Our
                <br />
                Story!
              </h4>
            </div>
          </li>
        </ul>
      </div>
    </section>
    <!-- service Grid-->

    <section class="page-section bg-light" id="service">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Services</h2>
          <h3 class="section-subheading text-muted">
            Lorem ipsum dolor sit amet consectetur.
          </h3>
        </div>
        <div class="row">
        @if (!empty($layanan))
        @foreach ($layanan as $data)
          <div class="col-lg-4 col-sm-6 mb-4">
            <!-- service item 1-->
            <div class="service-item">
              <a
                class="service-link"
                data-bs-toggle="modal"
                href="#serviceModal{{$data->id_layanan}}"
              >
                <div class="service-hover">
                  <div class="service-hover-content">
                    <i class="fas fa-plus fa-3x"></i>
                  </div>
                </div>
                <img
                  class="img-fluid" width="1000" style="height: 300px"
                  src="{{ 'storage/thumbs/layanan/' . $data->thumb }}"
                  {{-- src="storage/thumbs/layanan/1638212506.jpg" --}}

                  alt="..."
                />
              </a>
              <div class="service-caption">
                <div class="service-caption-heading">{{$data->nama_layanan}}</div>
              </div>
            </div>
          </div>
        @endforeach
        @endif
        </div>
      </div>
    </section>


    <section class="page-section bg-light"   id="team">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
          <h3 class="section-subheading text-muted">
            Lorem ipsum dolor sit amet consectetur.
          </h3>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="team-member">
              <img
                class="mx-auto rounded-circle"
                src="assets2/img/team/1.jpg"
                alt="..."
              />
              <h4>Parveen Anand</h4>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="team-member">
              <img
                class="mx-auto rounded-circle"
                src="assets2/img/team/2.jpg"
                alt="..."
              />
              <h4>Diana Petersen</h4>
              <p class="text-muted">Hair Styler</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="team-member">
              <img
                class="mx-auto rounded-circle"
                src="assets2/img/team/3.jpg"
                alt="..."
              />
              <h4>Larry Parker</h4>
              <p class="text-muted">Hair Styler</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut
              eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam
              corporis ea, alias ut unde.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact-->
    <section class="page-section" id="contact">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">For More Information</h2>
          <a
          class="btn btn-primary btn-lg"
          href="#services"
          style="
            background-color: #131311;
            font-family: Palatino Linotype;
            color: #eeb35b;
            border-style: solid;
            border-width: thin;
          "
          href="#contact"
          >Contact Us</a
        >
        </div>
        <div class="row mt-5">
          <div class="col-lg-4">
            <div class="team-member">
              <img
                class="mx-auto rounded-circle"
                src="assets2/img/logo-brother2.png"
                alt="..."
              />

            </div>
          </div>
          <div class="col-lg-4">
            <div class="team-member">

            </div>
          </div>
          <div class="col-lg-4">
              <center>
                <h4 class="section-heading" style="font-family: Palatino Linotype; font-weight: normal;">Our Location's</h4>
              </center>


              <div class="team-member mt-4">
                    @foreach ($barber as $data)

                    <div class="service-item mb-4">
                        <a class="service-link" data-bs-toggle="modal" href="#serviceModal{{ $data->id_barber }}">
                            <a class="btn btn-primary btn-lg"
                                data-bs-toggle="modal" href="#locationModal{{ $data->id_barber }}" style=" background-color: #eeb35b; font-family: Palatino Linotype; color: #131311; border-style: solid; border-width: thin;" href="#contact">{{ $data->nama_barber }}
                            </a>
                        </a>
                    </div>
                    @endforeach
                </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-4 text-lg-start">
            Copyright 2021 &copy; Brother barbershop
          </div>
        </div>
      </div>
    </footer>

    @include('partials.modal')


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
