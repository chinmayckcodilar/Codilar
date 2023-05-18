<?php

namespace Codilar\Rma\Controller\Adminhtml\Condition;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Codilar\Rma\Api\ConditionRepositoryInterface;
use Codilar\Rma\Api\Data\ConditionInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends Action
{
    protected $resultPageFactory;
    protected $conditionRepository;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ConditionRepositoryInterface $conditionRepository,
		ConditionInterface $conditionInterface
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->conditionRepository = $conditionRepository;
		$this->conditionInterface = $conditionInterface;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $id = isset($data['condition_id']) ? $data['condition_id'] : null;
            try {
                /** @var ConditionInterface $condition */
				$condition = $this->conditionInterface;
				if ($id != null) {
					$condition = $this->conditionRepository->getById($id);
				}
                $condition->setData($data);
                $this->conditionRepository->save($condition);

                $this->messageManager->addSuccessMessage(__('The condition has been saved.'));
                $this->_getSession()->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $condition->getId(), '_current' => true]);
                }

                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                $this->_getSession()->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the condition.'));
                $this->_getSession()->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }

        return $resultRedirect->setPath('*/*/');
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Codilar_Rma::condition');
    }
}
