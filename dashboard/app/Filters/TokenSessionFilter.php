<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class TokenSessionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (! $session->get('access_granted')) {
            return redirect()->to('/access-token')->with('error', 'Masukkan token terlebih dahulu');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
