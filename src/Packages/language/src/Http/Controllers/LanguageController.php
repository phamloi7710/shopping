<?php

namespace Botble\Language\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Language\Http\Requests\LanguageRequest;
use Botble\Language\Repositories\Interfaces\LanguageInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Language\Tables\LanguageTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Language\Forms\LanguageForm;
use Botble\Base\Forms\FormBuilder;

class LanguageController extends BaseController
{
    /**
     * @var LanguageInterface
     */
    protected $languageRepository;

    /**
     * LanguageController constructor.
     * @param LanguageInterface $languageRepository
     * @author Sang Nguyen
     */
    public function __construct(LanguageInterface $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    /**
     * Display all languages
     * @param LanguageTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Sang Nguyen
     * @throws \Throwable
     */
    public function getList(LanguageTable $table)
    {

        page_title()->setTitle(trans('plugins/language::language.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     * @author Sang Nguyen
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/language::language.create'));

        return $formBuilder->create(LanguageForm::class)->renderForm();
    }

    /**
     * Insert new Language into database
     *
     * @param LanguageRequest $request
     * @return BaseHttpResponse
     * @author Sang Nguyen
     */
    public function postCreate(LanguageRequest $request, BaseHttpResponse $response)
    {
        $language = $this->languageRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(LANGUAGE_MODULE_SCREEN_NAME, $request, $language));

        return $response
            ->setPreviousUrl(route('language.list'))
            ->setNextUrl(route('language.edit', $language->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * Show edit form
     *
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     * @author Sang Nguyen
     */
    public function getEdit($id, FormBuilder $formBuilder, Request $request)
    {
        $language = $this->languageRepository->findOrFail($id);

        event(new BeforeEditContentEvent(LANGUAGE_MODULE_SCREEN_NAME, $request, $language));

        page_title()->setTitle(trans('plugins/language::language.edit') . ' #' . $id);

        return $formBuilder->create(LanguageForm::class, ['model' => $language])->renderForm();
    }

    /**
     * @param $id
     * @param LanguageRequest $request
     * @return BaseHttpResponse
     * @author Sang Nguyen
     */
    public function postEdit($id, LanguageRequest $request, BaseHttpResponse $response)
    {
        $language = $this->languageRepository->findOrFail($id);

        $language->fill($request->input());

        $this->languageRepository->createOrUpdate($language);

        event(new UpdatedContentEvent(LANGUAGE_MODULE_SCREEN_NAME, $request, $language));

        return $response
            ->setPreviousUrl(route('language.list'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     * @author Sang Nguyen
     */
    public function getDelete(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $language = $this->languageRepository->findOrFail($id);

            $this->languageRepository->delete($language);

            event(new DeletedContentEvent(LANGUAGE_MODULE_SCREEN_NAME, $request, $language));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.cannot_delete'));
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @author Sang Nguyen
     * @throws Exception
     */
    public function postDeleteMany(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $language = $this->languageRepository->findOrFail($id);
            $this->languageRepository->delete($language);
            event(new DeletedContentEvent(LANGUAGE_MODULE_SCREEN_NAME, $request, $language));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
