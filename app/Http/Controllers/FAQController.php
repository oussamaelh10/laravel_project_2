<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqQuestion;

class FaqController extends Controller
{
    public function index()
    {
        
 
        $user = auth()->user();
            // De gebruiker is een admin
            // Voer hier de logica uit om de FAQ-pagina weer te geven
            $categories = FaqCategory::whereIn('name', ['After-service', 'Vragen over ons'])->get();
            return view('faq.index', compact('categories'));
        
        
    }
 
public function store(Request $request)
{
    $validatedData = $request->validate([
        'category' => 'required',
        'question' => 'required',
        'answer' => 'required',
    ]);
 
    // Vind de categorie op basis van de naam
    $category = FaqCategory::where('name', $validatedData['category'])->first();
 
    // Als de categorie niet bestaat, maak er dan een nieuwe aan
    if (!$category) {
        $category = new FaqCategory();
        $category->name = $validatedData['category'];
        $category->save();
    }
 
    // Maak een nieuw vraag- en antwoordpaar
    $question = new FaqQuestion();
    $question->question = $validatedData['question'];
    $question->answer = $validatedData['answer'];
    $question->faq_category_id = $category->id;
    $question->category_id =$category->id;
    $question->save();
 
    return redirect()->route('faq.index')->with('success', 'Vraag en antwoord zijn succesvol opgeslagen.');
}
 
public function showCategories()
{
    $categories = FaqCategory::all();
 
    return view('faq.faq-categories', compact('categories'));
}

public function postResponse(Request $request, $questionId)
{
    $question = FaqQuestion::findOrFail($questionId);
 
    // Voeg validatie toe aan de response
    $validatedData = $request->validate([
        'response' => 'required|min:3',
    ]);
 
    $question->response = $request->response;
    $question->save();
 
    return redirect()->back()->with('success', 'Response gepost!');
}
public function destroy($id)

    {

        $question = FaqQuestion::findOrFail($id);




        if (auth()->user()->isAdmin()) {

            $question->delete();

            return redirect()->back()->with('success', 'Vraag succesvol verwijderd.');

        }




        return redirect()->back()->with('error', 'Je hebt geen toestemming om deze vraag te verwijderen.');

    }

}
