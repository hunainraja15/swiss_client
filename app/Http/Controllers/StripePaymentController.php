<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\User;
use Auth;

class StripePaymentController extends Controller
{
    public function stripePost(Request $request)
    {
        // dd($request->all());
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $token = $request->input('stripeToken');

            if (!$token) {
                throw new \Exception('Token is missing');
            }

            // Create a charge
            Charge::create([
                'amount' => 100 * 100, // amount in cents
                'currency' => 'usd',
                'description' => 'Test payment from your website.',
                'source' => $token,
            ]);

            $user = User::find(Auth::user()->id);
            $user->status = 'active';
            $user->save();

            return redirect()->route('home')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
