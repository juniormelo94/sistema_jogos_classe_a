<!-- Admin Acesso Modal -->
<div class="portfolio-modal modal fade" id="modalAdminFormAcesso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('assets/image/image-default/close-icon.svg') }}" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h3 class="text-uppercase">Acesso Administrativo</h3>

                            <!-- Form Acesso Admin -->
                            {!! Form::open(['route' => 'acessoadmin', 'id' => 'adminFormAcesso']) !!} 
                              <div class="form-group">
                                {!! Form::text('cpf', null, ['class' => 'form-control mask-cpf', 'placeholder' => 'CPF', 'required']) !!}
                              </div>
                              <div class="form-group">
                                {!! Form::text('senha', null, ['class' => 'form-control', 'placeholder' => 'Senha', 'maxlength' => '11', 'required']) !!}
                              </div>
                              {{ Form::button('Entrar', ['type' => 'submit', 'class' => 'btn btn-primary btn-xl text-uppercase'] )  }}
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>