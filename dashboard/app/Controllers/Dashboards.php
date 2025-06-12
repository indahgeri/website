<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvitedGuestModel;
use App\Models\RsvpModel;

class Dashboards extends BaseController
{
    public function index()
    {
        // Cek akses token/session
        if (!session('access_granted')) {
            return redirect()->to(site_url('access-token'));
        }
        $guestModel = new InvitedGuestModel();
        $rsvpModel = new RsvpModel();

        $totalGuests = $guestModel->countAllResults();
        $totalSent = $guestModel->where('is_sent', 1)->countAllResults();
        $totalOpened = $guestModel->where('is_opened', 1)->countAllResults();
        $totalRSVP = $guestModel->whereIn('rsvp_status', ['yes','no','maybe'])->countAllResults();
        $totalRSVPYes = $guestModel->where('rsvp_status', 'yes')->countAllResults();
        $totalRSVPNo = $guestModel->where('rsvp_status', 'no')->countAllResults();
        $totalRSVPMaybe = $guestModel->where('rsvp_status', 'maybe')->countAllResults();
        $totalRSVPPending = $guestModel->where('rsvp_status', 'pending')->countAllResults();
        $totalRsvpMessages = $rsvpModel->countAllResults();

        $data = [
            'title' => 'Dashboard',
            'totalGuests' => $totalGuests,
            'totalSent' => $totalSent,
            'totalOpened' => $totalOpened,
            'totalRSVP' => $totalRSVP,
            'totalRSVPYes' => $totalRSVPYes,
            'totalRSVPNo' => $totalRSVPNo,
            'totalRSVPMaybe' => $totalRSVPMaybe,
            'totalRSVPPending' => $totalRSVPPending,
            'totalRsvpMessages' => $totalRsvpMessages,
        ];
        return view('dashboards/index', $data);
    }
}
