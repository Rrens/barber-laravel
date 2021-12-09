<!-- service Modals-->
@if (!empty($layanan))
@foreach ($layanan as $data)
    <div
      class="service-modal modal fade"
      id="serviceModal{{ $data->id_layanan }}"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal">
            <img src="assets2/img/close-icon.svg" alt="Close modal" />
          </div>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="modal-body">
                  <!-- Project details-->
                  <h2 class="text-uppercase">{{ $data->nama_layanan }}</h2>
                  <p class="item-intro text-muted">
                    Membaguskan Potongan and
                  </p>
                  <img
                    class="img-fluid d-block mx-auto"
                    src="{{ 'storage/thumbs/layanan/' . $data->thumb }}"
                    alt="..."
                  />
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. At consequuntur dolor officiis ipsum deleniti magnam eligendi ab veritatis libero officia, sit dignissimos! Libero voluptas vero cum! Architecto, pariatur sit fugiat officiis maxime rem dolore exercitationem obcaecati reprehenderit repudiandae recusandae ullam? Blanditiis maxime maiores nobis ullam ducimus. Illo quo libero rerum aliquam officiis quam architecto quos consequatur repudiandae, autem veritatis esse harum aliquid sapiente hic nemo sequi iusto dolor sunt tempora provident dignissimos laborum! Totam molestias quod nam iusto ratione est explicabo omnis odio laboriosam libero praesentium ipsum illum culpa autem, alias provident voluptates. Dolores ad itaque qui commodi nisi vero!
                  </p>
                  <ul class="list-inline">
                    <li>
                      <strong>Client:</strong>
                      Ahmad
                    </li>
                  </ul>
                  <button
                    class="btn btn-primary btn-xl text-uppercase"
                    data-bs-dismiss="modal"
                    type="button"
                  >
                    <i class="fas fa-times me-1"></i>
                    Close Project
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach
@endif

{{-- SERVICE MODAL --}}


{{-- LOCATION MODAL --}}
    @foreach ($barber as $data)
    <div
      class="location-modal modal fade"
      id="locationModal{{ $data->id_barber }}"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal">
            <img src="assets2/img/close-icon.svg" alt="Close modal" />
          </div>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="modal-body">
                  <!-- Project details-->
                  <h2 class="text-uppercase">{{ $data->nama_barber }}</h2>
                  {{-- <p class="item-intro text-muted">
                    Meluruskan hati dan niat anda
                  </p> --}}
                  <img
                    class="img-fluid d-block mx-auto"
                    src="assets2/img/location/jatisari.jpg"
                    alt="..."
                  />
                  <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error quas molestias nesciunt aliquam placeat possimus a aperiam animi illum suscipit eaque ab expedita cupiditate fugit culpa aut quod sunt, iste molestiae. Earum illum qui aspernatur distinctio nulla sequi, voluptates corporis ad dolorum consequatur quibusdam, ipsum dolor obcaecati, voluptatum vel aut similique dolores! Laboriosam sint quibusdam voluptates ex suscipit dolor repellendus assumenda quas perspiciatis sunt explicabo sequi quod sed, labore obcaecati, praesentium et harum. Optio aliquid commodi ipsum eum, temporibus soluta cum. Officia dignissimos numquam magnam odio suscipit incidunt eos nulla, veritatis rerum doloribus recusandae ex nisi qui eligendi officiis non!
                  </p>
                  <h3>Location</h3>
                  <p>{{ $data->alamat }}</p>
                  <center>
                      <iframe src="{{ $data->link }}" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  </center>
                  <button class="btn btn-primary btn-xl text-uppercase mt-2" data-bs-dismiss="modal" type="button">
                    <i class="fas fa-times me-1"></i>
                    Close
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endforeach

{{-- LOCATION MODOAL --}}


{{-- CHOOSE LOCATION MODAL --}}
    <div
      class="location-modal modal fade"
      id="chooselocation"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal">
            <img src="assets2/img/close-icon.svg" alt="Close modal" />
          </div>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="modal-body">
                  <!-- Project details-->
                    <div class="container">
                        <div class="row sortable-card">
                        @foreach ($barber as $data)
                            <div class="col-12 col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>{{ $data->nama_barber }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{-- <p>Card <code>.card-primary</code></p> --}}
                                        <div class="service-item mb-4">
                                        <a class="service-link" data-bs-toggle="modal" href="#serviceModal1">
                                            <a class="btn btn-primary btn-lg "
                                                data-bs-toggle="modal" href="#locationModal{{ $data->id_barber }}" style=" background-color: #eeb35b; font-family: Palatino Linotype; color: #ffffff; border-style: solid; border-width: thin;" href="#contact">Detail Lokasi
                                            </a>
                                        </a>
                                        <a href="{{ route('home.show', $data->id_barber) }}" class="btn btn-primary me-4" style="color: black">
                                            <i class="fas fa-shopping-cart me-2"></i>Pilih Outlet
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                  <button class="btn btn-primary btn-xl text-uppercase mt-2" data-bs-dismiss="modal" type="button">
                    <i class="fas fa-times me-1"></i>
                    Close Project
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


{{-- CHOOSE LOCATION MODAL --}}
