<?php

namespace App\Http\Controllers;

use App\Models\FAQCategory;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        // Haal alle FAQ-categorieën op
        $categories = FAQCategory::all();
        $items = FAQItem::all();
        // Doorgeven van categorieën aan de weergave
        return view('faq.index', compact('categories','items'));
    }
}
