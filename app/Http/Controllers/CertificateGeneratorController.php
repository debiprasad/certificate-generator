<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use PDF;

class CertificateGeneratorController extends Controller
{
    /**
     * Generates the certificate
     *
     * @return Response
     */
    public function __invoke()
    {
        $pdf = PDF::loadView('certificate')->setPaper('a4', 'landscape');

        return $pdf->download('certificate.pdf');
    }

    /**
     * Generates the completion certificate
     *
     * @return Response
     */
    public function completionCertificate(Request $request)
    {
        // Load the Excel file which have the data.
        $completedSheet = Excel::selectSheetsByIndex(0)->load(storage_path('app/devlympics_2016.xlsx'));
        $completedEmails = array_flatten($completedSheet->get()->toArray());
        // Check whether the provided email ID is in the list
        // of students who have completed all the challenges.
        if (in_array($request->input('email'), $completedEmails)) {
            // Get the name of the participant
            $emailNameMapSheet = Excel::selectSheetsByIndex(2)->load(storage_path('app/devlympics_2016.xlsx'));
            $emailNameMapArray = $emailNameMapSheet->get()->toArray();
            $emailNameMap = [];
            array_walk($emailNameMapArray, function (&$a, $key) use (&$emailNameMap) {
                $emailNameMap[head($a)] = last($a);
            });
            if (array_key_exists($request->input('email'), $emailNameMap)) {
                $pdf = PDF::loadView('certificates/completion-certificate', ['name' => $emailNameMap[$request->input('email')]])->setPaper('a4', 'landscape');

                return $pdf->download('certificate.pdf');
            } else {
                return view('certificate-generation-error')->withMessage('We are unable to find your email ID in the list of participants who have completed all the challenges. If you have completed all the challenges but still see this message, then please contact debiprasad@gdgbbsr.com. Error code: E2');
            }
        } else {
            return view('certificate-generation-error')->withMessage('We are unable to find your email ID in the list of participants who have completed all the challenges. If you have completed all the challenges but still see this message, then please contact debiprasad@gdgbbsr.com. Error code: E1');
        }
    }

    /**
     * Generates the participation certificate
     *
     * @return Response
     */
    public function participationCertificate(Request $request)
    {
        // Load the Excel file which have the data.
        $participatedSheet = Excel::selectSheetsByIndex(1)->load(storage_path('app/devlympics_2016.xlsx'));
        $participatedEmails = array_flatten($participatedSheet->get()->toArray());
        // Check whether the provided email ID is in the list
        // of students who have participated in the contest.
        if (in_array($request->input('email'), $participatedEmails)) {
            // Get the name of the participant
            $emailNameMapSheet = Excel::selectSheetsByIndex(2)->load(storage_path('app/devlympics_2016.xlsx'));
            $emailNameMapArray = $emailNameMapSheet->get()->toArray();
            $emailNameMap = [];
            array_walk($emailNameMapArray, function (&$a, $key) use (&$emailNameMap) {
                $emailNameMap[head($a)] = last($a);
            });
            if (array_key_exists($request->input('email'), $emailNameMap)) {
                $pdf = PDF::loadView('certificates/participation-certificate', ['name' => $emailNameMap[$request->input('email')]])->setPaper('a4', 'landscape');

                return $pdf->download('certificate.pdf');
            } else {
                return view('certificate-generation-error')->withMessage('We are unable to find your email ID in the list of participants. If you have participated but still see this message, then please contact debiprasad@gdgbbsr.com. Error code: E4');
            }
        } else {
            return view('certificate-generation-error')->withMessage('We are unable to find your email ID in the list of participants. If you have participated but still see this message, then please contact debiprasad@gdgbbsr.com. Error code: E3');
        }
    }
}
