<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    // عرض صفحة التسجيل
    public function showRegistrationForm()
    {
        return view('register');
    }

    // عملية التسجيل
    public function register(Request $request)
    {
        // التحقق من المدخلات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // إنشاء المستخدم
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // تسجيل الدخول تلقائيًا بعد التسجيل
        Auth::login($user);

        // إضافة رسالة نجاح
        session()->flash('success', 'تم التسجيل بنجاح!');

        // إعادة التوجيه إلى صفحة posts
        return redirect()->route('posts.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/posts');
        }

        return redirect('login')->withErrors(['email' => 'Invalid credentials']);
    }



    public function logout(Request $request) {
        Auth::logout();
        return redirect('login');
    }

}
