<?php

namespace App\Livewire\Crypto;

use Livewire\Component;
use App\Services\CryptoService;

class PlainTextInput extends Component
{
    public $loading = false;
    public $alert = ['success' => false, 'error' => false, 'message' => ''];

    protected $listeners = [];
    
    public $body = '';
 
    public $secret = '';

    public function mount()
    {
        $this->listeners = [];
        $this->alert = ['success' => false, 'error' => false, 'message' => ''];
    }

    public function encryptMessage($button, CryptoService $cryptoService)
    {
        $this->validate([
            'body' => 'required',
            'secret' => 'required',
        ]);
        
        if($button == 'encrypt' && $this->body != '' && $this->secret != ''){
            $this->loading = true;
            $this->dispatch('resetError');
    
            $response = $cryptoService->encrypt($this->body, $this->secret);
            
            $error = explode(':', $response)[0];
            if ($error == 'Error') {
                $this->alert['error'] = true ;
                $this->alert['success'] = false ;
                $this->alert['message'] = $response;
            }else{
                $this->dispatch('encryptedTextUpdated', $response);
                $this->alert['success'] = true ;
                $this->alert['error'] = false ;
                $this->alert['message'] = 'Encrypted successfully';
            }
            $this->loading = false;
        }
    }

    public function render()
    {
        return view('livewire.crypto.plain-text-input');
    }
}