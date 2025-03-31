namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect('/admin-dashboard');
        }

        if ($user->role == 'vendedor') {
            return redirect('/vendedor-dashboard');
        }

        return redirect('/user-dashboard');
    }
}
