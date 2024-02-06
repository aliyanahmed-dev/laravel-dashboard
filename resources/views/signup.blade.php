@include('partials.header')
<section class="sign-up  py-xxl-5">
      <div class="container-lg py-5">
        <h2 class="text-start pb-4">{{ __('Sign Up') }} 
          <!-- <span class="primary-color">Up</span> -->
        </h2>
        <form action="" method="">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="input-group input-group-sm mb-3 shadow-sm">
                <span class="input-group-text" id="inputGroup-sizing-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary-color)"
                    class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                  </svg></span>
                <input type="text" class="form-control py-2" placeholder="First Name" aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm" required>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="input-group input-group-sm mb-3 shadow-sm">
                <span class="input-group-text" id="inputGroup-sizing-sm"> <svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="var(--primary-color)" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                  </svg></span>
                <input type="text" class="form-control py-2" placeholder="Last Name" aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-sm" required>
              </div>
          </div>

          <div class="col-12 col-lg-6">
            <div class="input-group input-group-sm mb-3 shadow-sm">
              <span class="input-group-text" id="inputGroup-sizing-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary-color)"
                  class="bi bi-envelope-fill" viewBox="0 0 16 16">
                  <path
                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                </svg></span>
              <input type="email" class="form-control py-2" placeholder="Email" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" required>
            </div>
          </div>

          <div class="col-12 col-lg-6">
            <div class="input-group input-group-sm mb-3 shadow-sm">
              <span class="input-group-text" id="inputGroup-sizing-sm">  
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary-color)"
                class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>
              </span>
              <input type="number" class="form-control py-2" placeholder="Phone No" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-sm" required>
            </div>
          </div>

          <div class="col-12 col-lg-6">
              <div class="input-group input-group-sm mb-3 shadow-sm">
                <span class="input-group-text" id="inputGroup-sizing-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary-color)"
                    class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path
                      d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                  </svg></span>
                <input type="password" class="form-control py-2" placeholder="Password"
                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="input-group input-group-sm mb-3 shadow-sm">
                <span class="input-group-text" id="inputGroup-sizing-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary-color)"
                    class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path
                      d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                  </svg></span>
                <input type="password" class="form-control py-2" placeholder="Confirm Password"
                  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-12">
              <div class="terms-desc bg-white py-4 px-5 rounded-1 shadow-sm">
                <h4 class="fs-6 text-center pb-2">{{ __('Terms & Conditions') }}</h4>
                <p class="terms-text overflow-y-scroll pe-4">{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique dolor malesuada, feugiat orci vel, tristique urna. Maecenas finibus, ligula non commodo ultrices, purus mauris posuere elit, at venenatis enim neque sed diam. Nam interdum mi et augue ullamcorper cursus. In sit amet magna ligula. Nullam quis dolor metus. Sed ac lacinia nulla, ut tempus risus. Proin pharetra nec mauris et condimentum. Proin gravida aliquam lorem et fringilla. Proin eget commodo nulla. Nam nibh erat, accumsan eget gravida nec, varius eget turpis. Donec eget placerat leo. Maecenas eu iaculis urna, a mattis augue.

Integer eget nulla nibh. Praesent at commodo enim. Ut nec sodales nibh. Sed at fermentum odio. Integer condimentum diam mi. Ut eu ligula et mauris condimentum rutrum vitae eget ante. Donec at pellentesque enim.

Curabitur dapibus mauris et mi tristique dignissim. Sed non augue vitae libero imperdiet posuere sit amet in leo. Sed posuere tempor pellentesque. Phasellus dictum lectus vel lorem facilisis, sit amet auctor dolor condimentum. Cras orci diam, volutpat in rutrum ut, pulvinar nec metus. Duis iaculis tincidunt odio vel porta. Ut posuere tempor erat a molestie. Aliquam lorem orci, mollis et magna vel, volutpat eleifend nisi. Aliquam feugiat eget libero non commodo. Phasellus eget rhoncus leo. Morbi non augue ullamcorper, imperdiet leo ut, viverra est.

In mauris diam, imperdiet vel dui vitae, aliquam lobortis ante. Aliquam varius pretium dolor et pharetra. Pellentesque nec varius turpis. Proin quis nulla nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras sodales mi risus. Proin eu magna cursus enim mattis aliquet nec vel ipsum. Nam imperdiet, diam in finibus malesuada, lacus lectus volutpat mauris, nec volutpat urna lectus at arcu. Fusce ac enim ligula.

Nam iaculis mauris ut quam fringilla, non vestibulum libero varius. Nulla pellentesque urna quis enim varius dapibus. Donec fermentum nibh cursus, pulvinar risus blandit, scelerisque justo. Cras a leo nulla. Vestibulum justo purus, gravida quis volutpat vitae, hendrerit in leo. Nulla eleifend consectetur ligula, non condimentum augue molestie quis. In odio libero, rhoncus vitae tempor a, tristique ac risus.') }}
                </p>
                  <div class="d-flex justify-content-center">
                  <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" value="" id="terms-check" checked required>
                    <label class="form-check-label text-color" for="terms-check">
                    {{ __('I accept and agree to the Terms & Conditions') }} 
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-3">
            <div class="col-12 col-lg-4 mx-auto">
            <button type="submit"
              class="btn rounded-pill bg-primary-color text-white mt-3 text-center px-5 w-100 shadow-sm">{{ __('Create Account') }}</button>
             </div>
          </div>
        </form>
      </div>
    </section>

@include('partials.footer')